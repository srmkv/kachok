import json

import requests
from bs4 import BeautifulSoup


def str_get_digits(string):
    return int(''.join(filter(str.isdigit, string)))


def get_steps(bs_obj):
    steps = []
    if bs_obj.select("#pt_steps"):
        for step in bs_obj.select("#pt_steps > .instructions > li:not(.as-ad-step)"):
            steps.append(step.select_one("p.instruction").get_text())
    return steps


def get_ingredients(bs_obj):
    ingredients = []

    for ingredient in bs_obj.select('#recept-list > .ingredient'):
        info_element = ingredient.select_one("span.ingredient-info")
        info = info_element.get_text() if info_element else ""
        amount = ingredient.select_one("span.squant").get_text()
        if amount:
            unit = ingredient.select_one("select.recalc_s_num > option:checked")
            amount += " " + unit.get_text() if unit else ingredient.select_one(".no-shrink > span.type").get_text()
        else:
            amount = ingredient.select_one('.no-shrink > span.type').get_text()

        ingredients.append({
            "name": ingredient.select_one("a.name").get_text(),
            "ingredient_info": info,
            "amount": amount
        })
    return ingredients


def get_method_preparation(bs_obj):
    prep_method = bs_obj.select(".method-preparation > .instructions > p")
    if prep_method:
        return ''.join(str(prep_method))
    elif bs_obj.select_one(".method-preparation > div"):
        return bs_obj.select_one(".method-preparation > div").get_text()

    return ""


BASE_URL = "https://1000.menu"

CATEGORY_URL = BASE_URL + "/catalog/pp-recepty"

res = requests.get(CATEGORY_URL)

bs = BeautifulSoup(res.text, 'html.parser')
print( bs.select('.search-pages > a')[-1].get_text() )
page_count = str_get_digits(bs.select('.search-pages > a')[-1].get_text())

dishes = []

dish_counter = 0

for page in range(1, page_count + 1):

    bs = BeautifulSoup(requests.get(f'{CATEGORY_URL}/{page}').text, 'html.parser')
    items = bs.select('.cooking-block > .cn-item:not(.ads_enabled)')

    for item in items:
        # Displaying progress
        print(f'Parsed items: {dish_counter}', end='\r')

        link = item.select_one('.photo > a')['href']
        bs_item = BeautifulSoup(requests.get(BASE_URL + link).text, 'html.parser')
        try:
            desc = bs_item.select_one('div[itemprop=description]')
            desc.select_one('.citation').clear()
            dish_item = {
                "name": bs_item.select_one('h1[itemprop=name]').get_text(),
                "description": desc.get_text(),
                "cooking_time": bs_item.select_one('.label-with-icon > .label > strong').get_text(),
                'ingredients': get_ingredients(bs_item),
                "steps": get_steps(bs_item),
                "image": bs_item.select_one(".main-photo > a > img")['src'],
                "energy": bs_item.select_one("#nutr_kcal").get_text(),
                "portion_gr": str_get_digits(bs_item.select_one("#nutr_port_calc_switch").select_one('[value="1"]').get_text()),
                "method_preparation": get_method_preparation(bs_item)
            }
            dishes.append(dish_item)
        except Exception as e:
            print(e)
            print("Error at page: " + link)

        dish_counter += 1

        output_file = open("/tmp/output.json", "w+")
        #output_file = open("../../../storage/app/data/output.json", "w+")
        output_file.write(json.dumps(dishes))
        output_file.close()


