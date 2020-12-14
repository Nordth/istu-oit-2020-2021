var doc = document;

$(doc).ready(function () {
    $.ajax({
        method: "POST",
        action: "test.php",
        submit: "Send"
    });
    $("<p>Login (4-18 symbols)</p>").appendTo($('#container'));
    $('<input>').attr({
        type: 'text',
        name: 'login',
        maxlength: 18,
        minlength: 4,
        necessary: true
    }).appendTo($('#container'));

    $("<p>Password (more than 6 symbols)</p>").appendTo($('#container'));
    $('<input>').attr({
        type: 'password',
        name: 'pass',
        minlength: 6,
        necessary: true
    }).appendTo($('#container'));

    $("<p>18+</p>").appendTo($('#container'));
    $('<input>').attr({
        type: 'checkbox',
        name: 'old',
        checked: false,
        necessary: false
    }).appendTo($('#container'));

    $("<p>male</p>").appendTo($('#container'));
    $('<input>').attr({
        type: 'radio',
        name: 'gen',
        checked: true,
        necessary: false
    }).appendTo($('#container'));

    $("<p>female</p>").appendTo($('#container'));
    $('<input>').attr({
        type: 'radio',
        name: 'gen',
        necessary: false
    }).appendTo($('#container'));

    $("<p>About me</p>").appendTo($('#container'));
    $('<input>').attr({
        type: 'textarea',
        name: 't1',
        wrap: 'soft',
        necessary: false
    }).appendTo($('#container'));

    $("<label>Press \"send\"</label>").appendTo($('#container'));
    $('<div>').attr({
        name: 'd1',
        necessary: false
    }).appendTo($('#container'));

    $('<input>').attr({
        type: 'submit',
        name: 'b',
        class: 'submit'
    }).appendTo($('#container'));

    $('#container').submit(function (e) {
        alert($('#container').serialize());
        e.stopPropagation();
        return false;
    });
});
$("#b").submit(function () {
    
    $("input").each(function(e) {
        if ($(e).necessary == true)
            $(e).required=true;
    });
});
