<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Dish;
use App\Models\Tarif;
use App\Models\Waist;
use App\Models\Water;
use App\Models\Energy;
use App\Models\Weight;
use App\Models\DayFood;
use App\Models\Program;
use App\Models\Approach;
use App\Models\FoodDish;
use App\Models\UserDish;
use App\Models\Exercises;
use App\Models\PeriodDay;
use App\Models\UserImage;
use App\Models\DayForFood;
use App\Models\Statistics;
use App\Models\TrainingDay;
use App\Models\BjuParametres;
use App\Models\PeriodTraining;
use App\Models\StatisticValues;
use App\Models\WaterParametres;
use Hamcrest\DiagnosingMatcher;
use App\Http\Controllers\Helper;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\WaterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BzuCalcRequest;
use App\Http\Requests\ProgramRequest;
use App\Http\Requests\NutritionRequest;
use App\Models\Barbell;
use Barryvdh\Debugbar\Facades\Debugbar;
use Symfony\Component\HttpFoundation\Request;

class UserManagementController extends Controller
{

    public function progress()
    {
        $afterPhoto = UserImage::where(
            [
                ['user_id', Auth::user()->id],
                ['type', 'after']
            ]
        )
            ->latest()
            ->first();

        $beforePhoto = UserImage::where(
            [
                ['user_id', Auth::user()->id],
                ['type', 'before']
            ]
        )
            ->latest()
            ->first();

        $singlePhoto = UserImage::where(
            [
                ['user_id', Auth::user()->id],
                ['type', 'single']
            ]
        )
            ->latest()
            ->first();


        $weight = Weight::where('user_id', Auth::user()->id)->get();
        $waist = Waist::where('user_id', Auth::user()->id)->get();
        $statisticValue = StatisticValues::where('user_id', Auth::user()->id)->get();

        $weights = '';
        foreach ($weight as $w) {
            $weights .= $w->weight . ', ';
        }
        $waists = '';
        foreach ($waist as $w) {
            $waists .= $w->waist . ', ';
        }
        $statisticValues = '';
        foreach ($statisticValue as $s) {
            $statisticValues .= $s->value . ', ';
        }

        $statistic = Statistics::where('user_id', Auth::user()->id)->first();


        return view(
            'auth.dashboard',
            compact(
                'beforePhoto',
                'afterPhoto',
                'singlePhoto',
                'weights',
                'waists',
                'statistic',
                'statisticValues'
            )
        );
    }

    public function photoStore(Request $request)
    {
        request()->validate(
            [
                'photo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
        }

        $image = UserImage::create(
            [
                'user_id' => Auth::user()->id,
                'photo' => $postImage,
                'type' => $request->type
            ]
        );


        return redirect()->route('progress');
    }

    public function weightStore(Request $request)
    {
        request()->validate(
            [
                'weight' => 'required|integer|between:1,200',
                'date' => 'required',
            ]
        );

        Weight::create(
            [
                'user_id' => Auth::user()->id,
                'weight' => $request->weight,
                'date' => $request->date,
            ]
        );


        return redirect()->route('progress');
    }

    public function waistStore(Request $request)
    {
        request()->validate(
            [
                'waist' => 'required|between:1,500',
                'date' => 'required',
            ]
        );

        Waist::create(
            [
                'user_id' => Auth::user()->id,
                'waist' => $request->waist,
                'date' => $request->date,
            ]
        );


        return redirect()->route('progress');
    }

    public function profile()
    {
        return view('auth.laravel-examples.user-profile');
    }

    public function profileStore(Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]
        );

        $user = Auth::user();

        $user->update($request->all());


        return redirect()->route('profile');
    }

    public function passwordChange(Request $request)
    {
        request()->validate(
            [
                'oldpassword' => 'required',
                'password' => 'required',
            ]
        );

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->update();


        return redirect()->route('profile');
    }

    public function profilePhotoStore(Request $request)
    {
        request()->validate(
            [
                'photo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
        }

        $user = Auth::user();
        $user->photo = $postImage;
        $user->save();

        return redirect()->route('profile');
    }

    public function statisticStore(Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
                'variable' => 'required',
            ]
        );

        Statistics::create(
            [
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'variable' => $request->variable,
            ]
        );


        return redirect()->route('progress');
    }

    public function valueStore(Request $request)
    {
        request()->validate(
            [
                'value' => 'required|between:1,500',
                'date' => 'required',
            ]
        );

        StatisticValues::create(
            [
                'user_id' => Auth::user()->id,
                'value' => $request->value,
                'date' => $request->date,
            ]
        );


        return redirect()->route('progress');
    }

    public function tools()
    {
        $bjuParametres = BjuParametres::where('user_id', Auth::user()->id)
            ->latest()
            ->first();
        $waterParametres = WaterParametres::where('user_id', Auth::user()->id)
            ->latest()
            ->first();
        $barbell = Barbell::where('active', 1)->OrderBy('sort', 'asc')->get();
        return view('auth.tools.index', compact('bjuParametres', 'waterParametres', 'barbell'));
    }

    public function consultations()
    {
        return view('auth.consultations.index');
    }

    public function rates()
    {
        $rates = Tarif::OrderBy('sort', 'asc')->get();
        return view('auth.rates.index', compact('rates'));
    }

    public function workouts()
    {
        $rates = Tarif::OrderBy('sort', 'asc')->get();
        $program = Program::where('user_id', Auth::user()->id)->first();
        $apparatus = json_decode($program?->apparatus, true);
        $bju = BjuParametres::where('user_id', Auth::user()->id)->first();
        return view('auth.workouts.index', compact('rates', 'program', 'bju', 'apparatus'));
    }

    public function nutrition(Request $request)
    {
        if ($request->has('dish_id')) {
            $dish = Dish::all()->random();
            $foodDish = FoodDish::where('dish_id', $request->dish_id)->first();
            $foodDish->update(['dish_id' => $dish->id]);
        }

        if ($request->has('add_dish')) {
            $dish = Dish::all()->random();
            FoodDish::create(
                [
                    'day_food_id' => $request->add_dish,
                    'dish_id' => $dish->id
                ]
            );
        }


        if ($request->has('del_dish_id')) {
            $foodDish = FoodDish::where('dish_id', $request->del_dish_id)->first();
            $foodDish->delete();
        }

        if ($request->has('dishCount') and $request->has('date')) {
            $dishCount = $request->dishCount;
            $date = $request->date;
            $dayFood = DayFood::create(
                [
                    'user_id' => Auth::user()->id,
                    'date' => $date
                ]
            );
            $dishes = Dish::all()->random($dishCount);

            foreach ($dishes as $dish) {
                FoodDish::create(
                    [
                        'day_food_id' => $dayFood->id,
                        'dish_id' => $dish->id
                    ]
                );
            }
        }

        if (
            !$request->has('dishCount') and !$request->has('date')
            and !$request->has('dish_id') and !$request->has('del_dish_id')
            and !$request->has('add_dish') and !$request->has('count_updated')
        ) {
            $energy = Energy::where('user_id', Auth::user()->id)->latest()->first();
            return view('auth.nutrition.index', compact('energy'));
        }

        $energy = Energy::where('user_id', Auth::user()->id)->latest()->first();
        $date = DayFood::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
	$dishes = Dish::select('dishes.*', 'food_dishes.count', 'food_dishes.id as fid')
	    ->join('food_dishes', 'food_dishes.dish_id', '=', 'dishes.id')
            ->where('day_food_id', $date->id)
	    ->with('ingredients')
	    ->get();

        $sumEnergy = 0;
        foreach ($dishes as $dish) {
            $sumEnergy += $dish->energy * $dish->count;
        }

        $differenceEnergy = $energy->energy - $sumEnergy;
        return view('auth.nutrition.index', compact('dishes', 'date', 'energy', 'differenceEnergy'));
    }


    public function food()
    {
        $days = DayFood::where('user_id', Auth::user()->id)->OrderBy('date', 'desc')->get();
        $energy = Energy::where('user_id', Auth::user()->id)->first();
        return view('auth.food.index', compact('days', 'energy'));
    }

    public function ratesChange($id)
    {
        $rate = Tarif::findOrFail($id);
        $user = Auth::user();
        $user->traffic = $rate->name;
        $user->save();
        return back();
    }


    public function DayForFoodStore(Request $request)
    {
        request()->validate(
            [
                'kkal' => 'required|between:1,10000',
                'date' => 'required',
            ]
        );

        DayForFood::create(
            [
                'user_id' => Auth::user()->id,
                'kkal' => $request->kkal,
                'date' => $request->date,
            ]
        );


        return redirect()->route('food');
    }

    public function foodDay($id)
    {
        $energy = Energy::where('user_id', Auth::user()->id)->first();
        $day = DayFood::findOrFail($id);
	$dishes = Dish::select('dishes.*', 'food_dishes.count', 'food_dishes.id as fid')
            ->join('food_dishes', 'food_dishes.dish_id', '=', 'dishes.id')
            ->where('day_food_id', $id)
            ->with('ingredients')
            ->get();

//        $dishes = Dish::join('food_dishes', 'food_dishes.dish_id', '=', 'dishes.id')
//            ->where('day_food_id', $id)
//            ->get();

        $sumEnergy = 0;
        foreach ($dishes as $dish) {
            $sumEnergy += $dish->energy * $dish->count;
        }

        $differenceEnergy = $energy->energy - $sumEnergy;

        return view('auth.food.day', compact('day', 'dishes', 'energy', 'differenceEnergy'));
    }

    public function changeCountFood($id, $count)
    {
        if( $count > 0 ) {
            $foodDish = FoodDish::with('DayFood')->find($id);
            if( $foodDish?->DayFood->user_id == auth()->id() ) {
                $foodDish->count = $count;
                $foodDish->save();
            }
            if(parse_url(url()->previous())['path'] == '/user/nutrition') {
                return redirect()->route('nutrition', ['count_updated' => 1]);
            }
            return back();
        }
    }

    public function addRandomFood($date_id)
    {
        $dish = Dish::all()->random();

        FoodDish::create(
            [
                'day_food_id' => $date_id,
                'dish_id' => $dish->id
            ]
        );;

        return back();
    }

    public function changeRandomFood($date_id, $dish_id)
    {
        $userDish = FoodDish::where('dish_id', $dish_id)->where('day_food_id', $date_id)->first();
        $dish = Dish::all()->random(1);
        $userDish->dish_id = $dish[0]->id;
        $userDish->save();
        return back();
    }

    public function deleteFood($date_id, $dish_id)
    {
        $userDish = FoodDish::where('dish_id', $dish_id)->where('day_food_id', $date_id)->first();
        $userDish->delete();
        return back();
    }


    public function periodDay($id, Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
            ]
        );

        PeriodDay::create(
            [
                'day_id' => $id,
                'name' => $request->name
            ]
        );

        return redirect()->route('food.day', $id);
    }

    public function dishStore($id, Request $request)
    {
        request()->validate(
            [
                'period_day_id' => 'required',
                'name' => 'required',
                'gram' => 'required|between:1,10000',
                'protein' => 'required|between:1,10000',
                'fat' => 'required|between:1,10000',
                'energy' => 'required|between:1,10000',
                'photo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
        }

        UserDish::create(
            [
                'period_day_id' => $request->period_day_id,
                'name' => $request->name,
                'gram' => $request->gram,
                'protein' => $request->protein,
                'fat' => $request->fat,
                'energy' => $request->energy,
                'photo' => $postImage,
            ]
        );

        return redirect()->route('food.day', $id);
    }

    public function get_calendar($mon = null) {
        $mon = $mon ?? now()->format('m');
        $startOfMonth = Carbon::parse('01-' . $mon . '-' . date('Y'));
        $firstOfMonthDay = date("D", $startOfMonth->timestamp);
        $losDayCount = $this->getDayId($firstOfMonthDay);
        $endOfMonth = Carbon::parse($startOfMonth)->endOfMonth();
        return [
            'start' => $startOfMonth,
            'firstDay' => $firstOfMonthDay,
            'losDayCount' => $losDayCount,
            'end' => $endOfMonth
        ];
    }

    public function training(Request $request)
    {
        // $days = TrainingDay::where('user_id', Auth::user()->id)->delete();

        if( $request->input('month') ) {
            $month = (int) $request->input('month');
            if($month && $month < 13) {
                $calendar = $this->get_calendar( $month );
                $startOfMonth = $calendar['start'];
                $losDayCount = $calendar['losDayCount'];
        
                $program = Program::where('user_id', Auth::user()->id)->first();
                $firstDay = TrainingDay::where('user_id', Auth::user()->id)->whereMonth('date', $calendar['start']->format('m'))->first();
                $days = TrainingDay::where('user_id', Auth::user()->id)->whereMonth('date', $calendar['start']->format('m'))->OrderBy('date', 'asc')->get();

                $lostDaysMonth = $firstDay ? (int) date('d',strtotime($firstDay->date)) : $calendar['end']->format('d');
                // dd(compact('losDayCount', 'lostDaysMonth', 'firstDay', 'days', 'program', 'startOfMonth'));
                return view('auth.training.index', compact('losDayCount', 'lostDaysMonth', 'firstDay', 'days', 'program', 'startOfMonth'));

                
            } else {
                return abort(404);
            }
        } else {

        }


        $days = TrainingDay::where('user_id', Auth::user()->id)->whereMonth('date', now()->format('m'))->OrderBy('date', 'asc')->get();
        $program = Program::where('user_id', Auth::user()->id)->first();

        if ($program) {
            $firstDay = TrainingDay::where('user_id', Auth::user()->id)->whereMonth('date', now()->format('m'))->first();
            
            if( $firstDay ) {
                // $firstDay->date = "2023-07-21";
                $startOfMonth = Carbon::parse($firstDay->date)->startOfMonth();
                $firstOfMonthDay = date("D", $startOfMonth->timestamp);

                $firstDay = $firstDay->date;
                
                $losDayCount = $this->getDayId($firstOfMonthDay);
                
                $lostDaysMonth = (int) date('d',strtotime($firstDay));

                // dd($losDayCount, $lostDaysMonth, $firstDay);
                // dd(compact('losDayCount', 'lostDaysMonth', 'firstDay', 'days', 'program', 'startOfMonth'));
                return view('auth.training.index', compact('losDayCount', 'lostDaysMonth', 'firstDay', 'days', 'program', 'startOfMonth'));
            }
            
        }
        $startOfMonth = Carbon::parse()->startOfMonth();

        return view('auth.training.index', compact('days', 'program', 'startOfMonth'));
    }

    public function getDayId($day)
    {
        switch ($day) {
            case "Mon":
                $losDayCount = 0;
                break;
            case "Tue":
                $losDayCount = 1;
                break;
            case "Wed":
                $losDayCount = 2;
                break;
            case "Thu":
                $losDayCount = 3;
                break;
            case "Fri":
                $losDayCount = 4;
                break;
            case "Sat":
                $losDayCount = 5;
                break;
            case "Sun":
                $losDayCount = 6;
                break;
        }
        return $losDayCount;
    }

    public function DayTrainingStore(Request $request)
    {
        request()->validate(
            [
                'description' => 'required',
                'date' => 'required',
            ]
        );

        TrainingDay::create(
            [
                'user_id' => Auth::user()->id,
                'description' => $request->description,
                'date' => $request->date,
            ]
        );

        return redirect()->route('training');
    }

    public function trainingDay($id)
    {
        $day = TrainingDay::findOrFail($id);
        $program = Program::where('user_id', $day->user_id)->first();
        $periods = PeriodTraining::where('training_day_id', $id)->get();
        $exercises = DB::table('exercises')
            ->select('name', DB::raw('count(*) as total'))
            ->where('type_train', $day->description)
            ->whereIn('apparatus_id', array_keys(json_decode($program->apparatus, true)))
            // ->where('room', $program->)
            // ->where('train_type')
            // ->where('experience', Helper::getExperienceTypeRu($program->experience))
            ->groupBy('name')
            ->get();

        return view('auth.training.day', compact('day', 'periods', 'exercises'));
    }

    public function periodTrainingStore($id, Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
            ]
        );

        PeriodTraining::create(
            [
                'training_day_id' => $id,
                'name' => $request->name
            ]
        );

        return redirect()->route('training.day', $id);
    }

    public function approachStore($id, Request $request)
    {
        request()->validate(
            [
                'period_training_id' => 'required',
                'kg' => 'required|between:1,10000',
                'repeat' => 'required|between:1,10000',
            ]
        );

        Approach::create(
            [
                'period_training_id' => $request->period_training_id,
                'kg' => $request->kg,
                'repeat' => $request->repeat,
            ]
        );

        return redirect()->route('training.day', $id);
    }

    public function bzu_calc(BzuCalcRequest $request)
    {
        $data = $request->validated();

        $kkal = 10 * $data['weight_now'] + 6.25 * $data['height'] - 5 * $data['age'];

        if ($data['gender'] == 'men') {
            $kkal += 5;
        } elseif ($data['gender'] == 'women') {
            $kkal -= 161;
        }

        $kkal = round($kkal * (float)$data['activity'] * (float)$data['goal']);

        $bzu['protein'] = round($kkal * 0.3 / 4);
        $bzu['fat'] = round($kkal * 0.3 / 9);
        $bzu['carbohydrate'] = round($kkal * 0.4 / 4);

        $energy = Energy::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
            ],
            [
                'energy' => $kkal,
                'protein' => $bzu['protein'],
                'fat' => $bzu['fat'],
                'carbohydrate' => $bzu['carbohydrate']
            ]
        );

        BjuParametres::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
            ],
            [
                'goal' => $data['goal'],
                'weight_now' => $data['weight_now'],
                'height' => $data['height'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'activity' => $data['activity'],
                'desired_weight' => $data['desired_weight']
            ]
        );

        return view('auth.tools.bzu', compact('kkal', 'bzu'));
    }

    public function waterCalc(WaterRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        WaterParametres::updateOrCreate(
            [
                'user_id' => $data['user_id'],
            ],
            [
                'height' => $data['height'],
                'gender' => $data['gender'],
                'active_time' => $data['active_time']
            ]
        );

        $waterml = ($data['height'] - 100) * 0.03;

        if ($data['gender'] == 'men') {
            $water['water_with_train'] = ($waterml + $data['active_time'] * 0.04) * 1000;
        } elseif ($data['gender'] == 'women') {
            $water['water_with_train'] = ($waterml + $data['active_time'] * 0.06) * 1000;
        }
        $water['water_without_train'] = $waterml * 1000;

        Water::updateOrCreate(
            [
                'user_id' => $data['user_id'],
            ],
            [
                'water_with_train' => $water['water_with_train'],
                'water_without_train' => $water['water_without_train']
            ]
        );

        return view('auth.tools.water', compact('water'));
    }

    public function trainProgramCreate(ProgramRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $program = Program::updateOrCreate(
            [
                'user_id' => $data['user_id'],
            ],
            [
                'age' => $data['age'],
                'gender' => $data['gender'],
                'goal' => $data['goal'],
                'number_of_workouts_per_week' => count($data['day']),
                'day' => json_encode($data['day']),
                'train_type' => $data['train_type'],
                'experience' => $data['experience'],
                'apparatus' => json_encode($data['apparatus']),
                'apparatus_comment' => 'apparatus_comment'
            ]
        );

        $startDate = now();
        $endDate = now()->endOfMonth();
        $currentDate = $startDate;
        
        $days = json_decode($program->day);

        switch ($data['experience']) {
            case "beginner":
                $description = array("Фулбоди низ", "Фулбоди верх");
                break;
            case "experienced":
                $description = array("Корпус + Спина", "Ноги", "Руки + Дельты + Грудные");
                break;
            case "pro":
                $description = array("Руки + Дельты", "Ноги", "Грудь + дельты", "Корпус + Спина");
                break;
            case "super_pro":
                $description = array("Дельты + Спина", "Руки + Дельты", "Ноги", "Корпус + Спина", "Грудь + Руки");
                break;
        }
        $i = 0;
        // TrainingDay::where('user_id',  $data['user_id'])->delete();
        while ($currentDate <= $endDate) {
            Debugbar::debug($currentDate );
            foreach ($days as $day) {
                if ($day == $currentDate->format('D')) {
                    $trainingDay = TrainingDay::updateOrCreate(
                        [

                            'user_id' => $data['user_id'],
                            'date' => $currentDate->format('Y-m-d')
                        ],
                        [
                            'description' => $description[$i]
                        ]
                    );
                    if ($description[$i] == end($description)) {
                        $i = -1;
                    }
                    $i++;
                    $currentDate = $currentDate->addDay();
                    //exercises
                    // $program = Program::where('user_id', Auth::user()->id)->first();
                    $apparatus_ids = array_keys(json_decode($program->apparatus, true));
                    $bjuParametres = BjuParametres::where('user_id', Auth::user()->id)->first();
                    switch ($program->goal) {
                        case "weight_loss":
                            $sets = 0;
                            $reps = 15;
                            $percent = 100;
                            break;
                        case "weight_maintenance":
                            $sets = 0;
                            $reps = 12;
                            $percent = 100;
                            break;
                        case "mass_gain":
                            $sets = 0;
                            $reps = 10;
                            $percent = 100;
                            break;
                    }

                    $room = Helper::getRoomTypeRu($program->train_type);

                    // $trigger_ids = inRandomOrder()
                    $deleted = PeriodTraining::where('training_day_id', $trainingDay->id)->delete();

                    $exercisesGroup = Exercises::where('type_train', $trainingDay->description)
                        ->where('room', $room)->whereIn('apparatus_id', $apparatus_ids)
                        ->inRandomOrder()->get()->groupBy('trigger');
                        
                    $exercises = array();
                    $count = 0;
                    foreach( $exercisesGroup as $ex ) {
                        $count++;
                        $exercises[] = $ex->first();
                        if( $count == 7 ) break;
                    }
                    
                    $deleted = PeriodTraining::where('training_day_id', $trainingDay->id)->delete();

                    foreach ($exercises as $exercise) {
                        $periodTraining = PeriodTraining::create(
                            [
                                'training_day_id' => $trainingDay->id,
                                'name' => $exercise->name
                            ]
                        );
                        for ($j = 0; $j <= $sets; $j++) {
                            Approach::create([
                                'period_training_id' => $periodTraining->id,
                                'repeat' => $reps,
                                'kg' => $bjuParametres->weight_now * 0//$percent / 100
                            ]);
                        }
                    }

                    //end exercises

                }
            }
            TrainingDay::updateOrCreate(
                [
                    'date' => $currentDate->format('Y-m-d'),
                    'user_id' => $data['user_id']
                ],
                [
                    'description' => 'отдых'
                ]
            );
            $currentDate = $currentDate->addDay();
        }

        return view('auth.workouts.finish', compact('program'));
    }

    public function approachDelete($id)
    {
        $approach = Approach::findOrFail($id);
        $approach->delete();
        return back();
    }

    public function approachEdit(Request $request, $id)
    {
        $approach = Approach::findOrFail($id);
        request()->validate(
            [
                'kg' => 'required|between:1,10000',
                'repeat' => 'required|between:1,10000',
            ]
        );

        $approach->update(
            [
                'kg' => $request->kg,
                'repeat' => $request->repeat,
            ]
        );

        return back();
    }


    public function periodDelete($id)
    {
        $period = PeriodTraining::findOrFail($id);
        $period->delete();
        return back();
    }

    public function operatingWeightCalc(Request $request)
    {
        request()->validate(
            [
                'weight' => 'required|between:1,10000',
            ]
        );

        $weight = round($request->weight * 0.75);
        return view('auth.tools.weight', compact('weight'));
    }
}
