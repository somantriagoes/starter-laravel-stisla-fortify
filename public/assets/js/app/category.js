$(document).ready(function() {
    // Modify paginate() param from jquery request
    var uriString = window.location.search;
    readDataTable(uriString);
});

function readDataTable(uri) {
    $.get('category-read'+uri, {}, function(data, status){
        $('#showDataTable').html(data);
    });
}

function create() {
    $.get('category/create', {}, function(data, status){
        $('#modal-title').html('ADD NEW CATEGORY');
        $('#page-form').html(data);
        $('#createModal').modal('show');
    });
}

function store() {
    var name = $('#name').val();
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

function edit(id) {
    $.get('category/'+id, {}, function(data, status){
        $('#modal-title').html('EDIT NEW CATEGORY');
        $('#page-form').html(data);
        $('#createModal').modal('show');
    });
}

function update(id) {
    var name = $('#name').val();
    $.ajax({
        type: 'get',
        url: 'category-update/'+id,
        data: 'name='+name,
        success: function(data) {
            $('.close').click();
            readDataTable('?page=1');
        }
    });
}

function destroy(id) {
    var checkstr =  confirm('are you sure you want to delete this?');
    if(checkstr == true){
        $.ajax({
            type: 'get',
            url: 'category-destroy/'+id,
            success: function() {
                $('.close').click();
                readDataTable('?page=1');
            }
        });
    }else{
        return false;
    }
}
