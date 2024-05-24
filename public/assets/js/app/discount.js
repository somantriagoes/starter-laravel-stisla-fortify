$(document).ready(function() {
    var uri_string = window.location.search;
    readDataTable(uri_string);
});

function readDataTable(uri) {
    console.log(uri);
    $.get('discount-read'+uri, {}, function(data, status){
        $('#showDataTable').html(data);
    });
}

function create() {
    $.get('discount/create', {}, function(data, status){
        $('#modal-title-save').html('ADD NEW DISCOUNT');
        $('#page-form').html(data);
        $('#createModal').modal('show');
    });
}

function store() {
    var name = $('#name').val();
    var type = $('#type').val();
    var discount = $('#discount').val();
    if(name == '') {
        $('#alert-modal-body-save').html("'Name' cannot be empty.");
        $('#alert-modal-save').modal('show');
    } else if(discount  == '' || discount  <= 0) {
        $('#alert-modal-body-save').html("'Discount' cannot be empty or null.");
        $('#alert-modal-save').modal('show');
    } else {
        $.ajax({
            type: 'get',
            url: 'discount-store',
            data: 'name='+name+'&type='+type+'&discount='+discount,
            success: function(data) {
                $('.close').click();
                readDataTable('?page=1');
            }
        });
    }

}

function edit(id) {
    $.get('discount/'+id, {}, function(data, status){
        $('#modal-title-save').html('EDIT NEW DISCOUNT');
        $('#page-form').html(data);
        $('#createModal').modal('show');
    });
}

function update(id) {
    var name = $('#name').val();
    var type = $('#type').val();
    var discount = $('#discount').val();
    var page = $('#page').val();

    if(name == '') {
        $('#alert-modal-body-save').html("'Name' cannot be empty.");
    } else if(discount  == '' || discount  <= 0) {
        $('#alert-modal-body-save').html("'Discount' cannot be empty or null.");
    } else {
        $.ajax({
            type: 'get',
            url: 'discount-update/'+id,
            data: 'name='+name+'&type='+type+'&discount='+discount,
            success: function(data) {
                $('.close').click();
                readDataTable('?page='+page);
                // $('#success').html('<div class="alert alert-success alert-dismissible show fade">'+
                //     '<div class="alert-body" id="alert-body">'+
                //     '<p>Discount change successfully</p>'+
                //     '</div></div>').delay(900).slideUp(300);
            }
        });

    }

    if(name == '' || discount  == '' || discount  <= 0) {
        $('#alert-modal-save').modal('show');
    }
}

function readDeleteModal(id) {
    $('#id_del').val(id);
    $('#modal-title-del').html('Confirmation');
    $('#modal-body-del').html('Are you sure you want to delete this discount data?');
    $('#alert-modal-del').modal('show');
}

function destroy() {
    var id = $('#id_del').val();
    var page = $('#page').val();
    $.ajax({
        type: 'get',
        url: 'discount-destroy/'+id,
        success: function() {
            $('.close').click();
            readDataTable('?page='+page);
        }
    });
}
