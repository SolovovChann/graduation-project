// Inputs 'data' into table
function updateTable(data){
    $('#table tr:first').siblings().remove();
    $('#table tr:first').after(data);
}
$('#addStudent').click(function(e){
    // Get all data from table
    let LastName    = $('#LastName').val(),
        FirstName   = $('#FirstName').val(),
        MidName     = $('#MidName').val(),
        BirthDate   = $('#BirthDate').val(),
        classId     = $('#classId').val(),
        button      = $(this),
        buttonLabel = button.html();
    
    // Form ajax query
    $.ajax({
        cache:      false,
        data:       { 'LastName' : LastName, 'FirstName' : FirstName, 'MidName' : MidName, 'BirthDate' : BirthDate, 'classId' : classId },
        dataType:   'html',
        method:     'POST',
        url:        'ajax/addStudent.php',

        beforeSend: function(){
            // Disable button
            button.prop('disabled', true);

            // Replace text to spinner
            button.html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                    <span class="sr-only">Загрузка...</span>
                </span>
            `);
        },
        
        success: function(data){
            // Enable button
            button.prop('disabled', false);

            // Get text back
            button.html(buttonLabel);
            updateTable(data);
        }
    });
});

$("#generateReport").click(function(e){
    // Get selected class ID
    let classId = $("select[name=classId] option:selected").val(),
        button = $(this),
        buttonLabel = button.html();

    // Form ajax query
    $.ajax({
        cache:      false,
        data:       { 'classId' : classId },
        dataType:   'html',
        method:     'POST',
        url:        'ajax/formTable.php',

        beforeSend: function(){
            // Disable button
            button.prop('disabled', true);

            // Replace text to spinner
            button.html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                    <span class="sr-only">Загрузка...</span>
                </span>
            `);
        },
        success: function(data){
            // Enable button
            button.prop('disabled', false);

            // Get text back
            button.html(buttonLabel);
            updateTable(data);
        }

    });
});

$("#generateName").click(function(e){
    const Name = [
        'Артем', 'Владимир', 'Владислав', 'Георгий', 'Герман', 'Гордей', 'Давид', 'Денис', 'Ермолай', 'Иван', 'Иисак', 'Лаврентий', 'Максим', 'Максимилиан', 'Мартин', 'Натан', 'Нелли', 'Олег', 'Онисим', 'Орест', 'Платон', 'Рубен', 'Феликс', 'Августин', 'Руслан', 'Альфред', 'Нисон', 'Юстиниан', 'Сергей', 'Семен', 'Арнольд', 'Пантелей', 'Касьян', 'Герман', 'Андрей', 'Платон', 'Флор', 'Наум', 'Альберт', 'Людвиг', 'Лавр', 'Филипп', 'Арсений', 'Аскольд', 'Алан', 'Марк', 'Арсен', 'Соломон', 'Любомир', 'Никифор', 'Гордий', 'Орест', 'Ибрагил', 'Никифор', 'Виссарион', 'Бронислав', 'Вячеслав', 'Мартын', 'Иван', 'Овидий', 'Самуил', 'Модест', 'Демьян', 'Нелли', 'Гурий', 'Давид', 'Прохор', 'Устин', 'Рудольф', 'Роман', 'Григорий', 'Оскар', 'Федор', 'Дмитри', 'Мэлор', 'Серапион', 'Аристарх', 'Тимур', 'Альберт', 'Пантелеймон', 'Христофор', 'Никола', 'Валерьян', 'Яковл', 'Протась', 'Дамир', 'Адольф', 'Богдан', 'Лукь', 'Юрь', 'Ирине', 'Филат', 'Авксенть', 'Григорь', 'Вадим', 'Юлиан', 'Анатоль', 'Созон',
    ];

    const Surname = [
        'Веселов', 'Волков', 'Громов', 'Гурьев', 'Евсеев', 'Жданов', 'Зыков', 'Князев', 'Кулагин', 'Морозов', 'Мухин', 'Никонов', 'Носов', 'Романов', 'Сазонов', 'Фролов', 'Носов', 'Кириллов', 'Сидоров', 'Брагин', 'Колобов', 'Денисов', 'Крылов', 'Пестов', 'Ермаков', 'Сергеев', 'Антонов', 'Чернов', 'Панов', 'Котов', 'Иванков', 'Горшков', 'Трофимов', 'Дементьев', 'Соболев', 'Борисов', 'Фокин', 'Лихачёв', 'Блинов', 'Калашников', 'Бобылёв', 'Молчанов', 'Соколов', 'Терентьев', 'Сафонов', 'Назаров', 'Стрелков', 'Копылов', 'Бобылёв', 'Доронин', 'Кудряшов', 'Мельников', 'Галкин', 'Никитин', 'Шестаков', 'Лазарев', 'Сысоев', 'Зыков', 'Агафонов', 'Пономарёв', 'Некрасов', 'Гурьев', 'Денисов', 'Трофимов', 'Макаров', 'Кириллов'
    ];
    
    let FirstName = Name[Math.ceil(Math.random() * Name.length-1)],
        SurName =   Surname[Math.ceil(Math.random() * Surname.length-1)],
        LastName =  Name[Math.ceil(Math.random() * Name.length-1)] + 'ович',
        MinDate =   new Date($('#BirthDate').attr('min')),
        MaxDate =   new Date($('#BirthDate').attr('max')),
        BirthDate = new Date(+MinDate + +Math.ceil(Math.random() * Math.abs(MaxDate - MinDate))),
        BD =        BirthDate.toISOString().substring(0, 10);
    
    $('#LastName').val(SurName);
    $('#FirstName').val(FirstName);
    $('#MidName').val(LastName);
    $('#BirthDate').val(BD);
    $(`#classId option:nth-child(${ Math.ceil(Math.random() * $('#classId option:first').siblings().length) })`).prop('selected', true);
    
});