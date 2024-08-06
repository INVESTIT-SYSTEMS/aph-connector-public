/* adde xperience */
var row01 = $(".attr01");

function addRow01() {
  row01.clone(true, true).appendTo("#addexperience");
}

function removeRow01(button) {
  button.closest("div.attr01").remove();
}

$('#addexperience .attr01:first-child').find('.remove01').hide();

/* Doc ready */
$(".add01").on('click', function () {
  addRow01();
  if ($("#addexperience .attr01").length > 1) {
    //alert("Can't remove row.");
    $(".remove01").show();
  }
});
$(".remove01").on('click', function () {
  if ($("#addexperience .attr01").size() == 1) {
    //alert("Can't remove row.");
    $(".remove01").hide();
  } else {
    removeRow01($(this));

    if ($("#addexperience .attr01").size() == 1) {
      $(".remove01").hide();
    }
  }
});


/* add project */
var row02 = $(".attr02");

function addRow02() {
  row02.clone(true, true).appendTo("#addproject");
}

function removeRow02(button) {
  button.closest("div.attr02").remove();
}

$('#addproject .attr02:first-child').find('.remove02').hide();

/* Doc ready */
$(".add02").on('click', function () {
  addRow02();
  if ($("#addproject .attr02").length > 1) {
    //alert("Can't remove row.");
    $(".remove02").show();
  }
});
$(".remove02").on('click', function () {
  if ($("#addproject .attr02").size() == 1) {
    //alert("Can't remove row.");
    $(".remove02").hide();
  } else {
    removeRow02($(this));

    if ($("#addproject .attr02").size() == 1) {
      $(".remove02").hide();
    }
  }
});


/* add education */
var row03 = $(".attr03");

function addRow03() {
  row03.clone(true, true).appendTo("#addeducation");
}

function removeRow03(button) {
  button.closest("div.attr03").remove();
}

$('#addeducation .attr03:first-child').find('.remove03').hide();

/* Doc ready */
$(".add03").on('click', function () {
  addRow03();
  if ($("#addeducation .attr03").length > 1) {
    //alert("Can't remove row.");
    $(".remove03").show();
  }
});
$(".remove03").on('click', function () {
  if ($("#addeducation .attr03").size() == 1) {
    //alert("Can't remove row.");
    $(".remove03").hide();
  } else {
    removeRow03($(this));

    if ($("#addeducation .attr03").size() == 1) {
      $(".remove03").hide();
    }
  }
});

/* add certificate */
var row04 = $(".attr04");

function addRow04() {
  row04.clone(true, true).appendTo("#addcertificate");
}

function removeRow04(button) {
  button.closest("div.attr04").remove();
}

$('#addcertificate .attr04:first-child').find('.remove04').hide();

/* Doc ready */
$(".add04").on('click', function () {
  addRow04();
  if ($("#addcertificate .attr04").length > 1) {
    //alert("Can't remove row.");
    $(".remove04").show();
  }
});
$(".remove04").on('click', function () {
  if ($("#addcertificate .attr04").size() == 1) {
    //alert("Can't remove row.");
    $(".remove04").hide();
  } else {
    removeRow04($(this));

    if ($("#addcertificate .attr04").size() == 1) {
      $(".remove04").hide();
    }
  }
});

/* add language */
var row05 = $(".attr05");

function addRow05() {
  row05.clone(true, true).appendTo("#addlanguage");
}

function removeRow05(button) {
  button.closest("div.attr05").remove();
}

$('#addlanguage .attr05:first-child').find('.remove05').hide();

/* Doc ready */
$(".add05").on('click', function () {
  addRow05();
  if ($("#addlanguage .attr05").length > 1) {
    //alert("Can't remove row.");
    $(".remove05").show();
  }
});
$(".remove05").on('click', function () {
  if ($("#addlanguage .attr05").size() == 1) {
    //alert("Can't remove row.");
    $(".remove05").hide();
  } else {
    removeRow05($(this));

    if ($("#addlanguage .attr05").size() == 1) {
      $(".remove05").hide();
    }
  }
});

/* add stystem */
var row06 = $(".attr06");

function addRow06() {
  row06.clone(true, true).appendTo("#addstystem");
}

function removeRow06(button) {
  button.closest("div.attr06").remove();
}

$('#addstystem .attr06:first-child').find('.remove06').hide();

/* Doc ready */
$(".add06").on('click', function () {
  addRow06();
  if ($("#addstystem .attr06").length > 1) {
    //alert("Can't remove row.");
    $(".remove06").show();
  }
});
$(".remove06").on('click', function () {
  if ($("#addstystem .attr06").size() == 1) {
    //alert("Can't remove row.");
    $(".remove06").hide();
  } else {
    removeRow06($(this));

    if ($("#addstystem .attr06").size() == 1) {
      $(".remove06").hide();
    }
  }
});