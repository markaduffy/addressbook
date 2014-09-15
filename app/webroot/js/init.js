$(document).ready(function() {

    $("#contact-form").validate();

    $("#first-name").rules("add", {required:true});
    $("#last-name").rules("add", {required:true});

    $("#full-name").rules("add", {required:true});
    $("#address1").rules("add", {required:true});
    $("#city").rules("add", {required:true});
    $("#state").rules("add", {required:true});



});