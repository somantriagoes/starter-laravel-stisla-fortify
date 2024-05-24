$(document).ready(function() {
    // Modify paginate() param from jquery request
    var uri_string = window.location.search;
    readDataTable(uri_string);
});

function readDataTable(uri) {
    console.log(uri);
    $.get('category-read'+uri, {}, function(data, status){
        $('#showDataTable').html(data);
    });
}

function create() {
    $.get('category/create', {}, function(data, status){
        $('#modal-title-save').html('ADD NEW CATEGORY');
        $('#page-form').html(data);
        $('#createModal').modal('show');
    });
}

function store() {
    var name = $('#name').val();
    if(name == '') {
        $('#alert-modal-body-save').html("'Name' cannot be empty.");
        $('#alert-modal-save').modal('show');
        // createAlert('','','Here is a bunch of text about some stuff that happened.','warning',false,true,'pageMessages');
    } else {
        $.ajax({
            type: 'get',
            url: 'category-store',
            data: 'name='+name,
            success: function(data) {
                $('.close').click();
                readDataTable('?page=1');
            }
        });
    }

}

function edit(id) {
    $.get('category/'+id, {}, function(data, status){
        $('#modal-title-save').html('EDIT NEW CATEGORY');
        $('#page-form').html(data);
        $('#createModal').modal('show');
    });
}

function update(id) {
    var name = $('#name').val();
    var page = $('#page').val();

    if(name == '') {
        $('#alert-modal-body-save').html("'Name' cannot be empty.");
        $('#alert-modal-save').modal('show');
    } else {
        $.ajax({
            type: 'get',
            url: 'category-update/'+id,
            data: 'name='+name,
            success: function(data) {
                $('.close').click();
                readDataTable('?page='+page);
                // $('#success').html('<div class="alert alert-success alert-dismissible show fade">'+
                // '<div class="alert-body" id="alert-body">'+
                // '<p>Category change successfully</p>'+
                // '</div></div>');
                // $("#success").delay(900).slideUp(300);
            }
        });
    }
}

// function destroy(id) {
//     var checkstr =  confirm('are you sure you want to delete this?');
//     if(checkstr == true){
//         $.ajax({
//             type: 'get',
//             url: 'category-destroy/'+id,
//             success: function() {
//                 $('.close').click();
//                 readDataTable('?page=1');
//             }
//         });
//     }else{
//         return false;
//     }
// }

function readDeleteModal(id) {
    $('#id_del').val(id);
    $('#modal-title-del').html('Confirmation');
    $('#modal-body-del').html('Are you sure you want to delete this category?');
    $('#alert-modal-del').modal('show');
}

function destroy() {
    var id = $('#id_del').val();
    var page = $('#page').val();
    $.ajax({
        type: 'get',
        url: 'category-destroy/'+id,
        success: function() {
            $('.close').click();
            readDataTable('?page='+page);
        }
    });
}
