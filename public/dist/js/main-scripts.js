

// Функции для перетаскивания блоков сохранения их позиций в локал сторедж и на сервер

// функция для сохранения позиций блоков в локальное хранилище
function savePositionsToLocal() {
    var positions = $('.block').map(function() {
        return {
            id: $(this).attr('id'),
            position: $(this).index() + 1
        };
    }).get();
    localStorage.setItem('blockPositions', JSON.stringify(positions));
}

// функция для обновления состояния кнопок "вверх" и "вниз" блоков
function updateBlockButtons() {
    var blocks = $('.block');
    blocks.find('.btn-up').prop('disabled', function() {
        return $(this).closest('.block').prev().length === 0;
    });
    blocks.find('.btn-down').prop('disabled', function() {
        return $(this).closest('.block').next().length === 0;
    });
}

// обработчик нажатия на кнопку "вверх"
$('.btn-up').click(function() {
    var block = $(this).closest('.block');
    var prev = block.prev();
    if (prev.length !== 0) {
        prev.before(block);
        updateBlockButtons();
        savePositionsToLocal();
    }
});

// обработчик нажатия на кнопку "вниз"
$('.btn-down').click(function() {
    var block = $(this).closest('.block');
    var next = block.next();
    if (next.length !== 0) {
        next.after(block);
        updateBlockButtons();
        savePositionsToLocal();
    }
});

// Настроить sortable с исключением ck-editor__editable из параметра cancel
$("#sortablecontainer").sortable({
    items: ".block",
    placeholder: "ui-state-highlight",
    cancel: "input:not(.ck-input),textarea:not(.ck-input),.ck-editor__editable", // отменяем сортировку, когда input и textarea в фокусе, но не отменяем, когда фокус находится в редакторе CKEditor
    distance: 10, // начинаем сортировку только после перемещения мыши на 10 пикселей
    sortchange: function(event, ui) {
        updateButtons();
    },
    stop: function(event, ui) {
        savePositionsToLocal();
        savePositionsToBackend();
    }
});



// восстанавливаем позиции блоков из локального хранилища
function restorePositionsFromLocal() {
    var positions = JSON.parse(localStorage.getItem('blockPositions'));
    if (positions) {
        $.each(positions, function(index, position) {
            $('#' + position.id).appendTo('#sortablecontainer').css('order', position.position);
        });
    }
    updateBlockButtons();
}

// вызов функций при загрузке страницы
$(document).ready(function() {
    restorePositionsFromLocal();
});

// функция оправки данных позиции блоков на бэк
function savePositionsToBackend() {
    var positions = [];
    $('.block').each(function() {
        var id = $(this).attr('id');
        var position = $(this).index() + 1;
        positions.push({ id: id, position: position });
    });
    $.ajax({
        type: 'POST',
        url: '/savePositions',
        data: JSON.stringify(positions),
        contentType: 'application/json',
        success: function(response) {
            console.log('Positions saved to backend:', response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error saving positions to backend:', errorThrown);
        }
    });
}


// функция оправки данных позиции блоков на бэк
function savePositionsToBackend() {
    var positions = [];
    $('.block').each(function() {
        var id = $(this).attr('id');
        var position = $(this).index() + 1;
        positions.push({ id: id, position: position });
    });
    $.ajax({
        type: 'POST',
        url: '/savePositions',
        data: JSON.stringify(positions),
        contentType: 'application/json',
        success: function(response) {
            console.log('Positions saved to backend:', response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error saving positions to backend:', errorThrown);
        }
    });
}




// Код сворачивания и разворачивания блоков
// JavaScript-код для добавления функциональности
const collapseBtns = document.querySelectorAll('.collapse-btn');

// Обходим все кнопки collapse-btn и добавляем для каждой обработчик события клика
collapseBtns.forEach(function(collapseBtn) {
    const targetId = collapseBtn.dataset.target;
    const articleContent = document.querySelector(`[data-id="${targetId}"]`);

    // Проверяем, сохранено ли состояние блока в localStorage
    const isCollapsed = localStorage.getItem(`articleCollapsed_${targetId}`);

    // Если состояние сохранено, сворачиваем или разворачиваем блок в зависимости от значения
    if (isCollapsed === 'true') {
        articleContent.style.display = 'none';
        collapseBtn.textContent = 'Развернуть';
    } else {
        articleContent.style.display = 'block';
        collapseBtn.textContent = 'Свернуть';
    }

    // Добавляем обработчик события клика на кнопку collapse-btn
    collapseBtn.addEventListener('click', function() {
        // Сворачиваем или разворачиваем блок при клике на кнопку
        if (articleContent.style.display === 'none') {
            $(articleContent).slideDown('slow');
            collapseBtn.textContent = 'Свернуть';
            // Сохраняем состояние блока в localStorage
            localStorage.setItem(`articleCollapsed_${targetId}`, 'false');
        } else {
            $(articleContent).slideUp('slow');
            collapseBtn.textContent = 'Развернуть';
            // Сохраняем состояние блока в localStorage
            localStorage.setItem(`articleCollapsed_${targetId}`, 'true');
        }
    });
});






// Подключаем CKEditor

$(".editor").each(function() {
    const el = this;
    ClassicEditor.create(el).catch((error) => {
        console.error(error);
    });
});

// Добавить класс ck-editor__editable к элементу редактора CKEditor
$(".editor").addClass("ck-editor__editable");

// Подключаем Dropzone

Dropzone.autoDiscover = false;

var dropzone = new Dropzone('#image-upload', {
    thumbnailWidth: 200,
    maxFilesize: 1,
    acceptedFiles: ".jpeg,.jpg,.png,.gif"
});