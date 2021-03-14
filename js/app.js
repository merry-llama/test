$(document).ready(function()
{
    var user = $("#type-user").text();

    getUsers(user);
    getStatusCheck();   
    
    $("#resetFilters").click(function(){
        $("input#userName").val('');
        $('body input:checkbox').prop('checked', false);
        $('#searchFilters').prop('disabled', true);
        getUsers(user);

    }); 

//     $("#usersTable").on('click','.btnSelect',function(){
//         // get the current row
//         // var currentRow = $(this).closest("tr"); 
        
//         // var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
//         // var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
//         // var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
//         // var data = col1+"\n"+col2+"\n"+col3;       
//         //alert(data);
//    });


   $('#updateUserModal').on('shown.bs.modal', function (e) {
        
        var name = $(e.relatedTarget).data("name");
        var id = $(e.relatedTarget).data("id");
        var status = $(e.relatedTarget).data("status");
        var modal = $(this);

        $.ajax({
            type: 'GET',
            url: "data/getDataSelect.php",
            async: false,
            success: function (text) {
                modal.find('#typeUserSelect').html(text);
                modal.find('#typeUserSelect option[value=' + status +']').prop('selected', true);
            }
        });

        modal.find('#modalUserName').val(name);
        modal.find('#modalId').val(id);
   });
 

   $('#btnUpdateUserModal').on('click', function () {

        var id = $(this).closest('.modal-content').find('#modalId').val(); 
        var name = $(this).closest('.modal-content').find('#modalUserName').val(); 
        var statusId = $(this).closest('.modal-content').find('#typeUserSelect').val(); 
        
        $.ajax({
            type: 'POST',
            url: "data/updateUser.php", 
            async: false,
            data: { id: id, name: name, status: statusId},
            success: function(result) {
                $('#usersTable').html(result);
                if (result){
                    getUsers(user);                                   
                }
            },
            error:  function(){
                $('#usersTable').html('Ошибка!');
            }
        });
        $('#updateUserModal').modal('hide'); 
       
    });

    $("#btnAddUser").click(function(){  
        addUser(user);
        $('#insertName').val('');
        $(this).prop('disabled', true);
    }); 

    $("#searchFilters").click(function(){
        searchUser(user);

    }); 

    $('.form-check').click(function(){
        var count = $(':checkbox:checked').length;
        var name = $('#insertName').val();
        if ((count == 0) && (!name == '')){
            $('#searchFilters').prop('disabled', true);
        }else {
            $('#searchFilters').prop('disabled', false);
        }
    });
    

    $('#insertName').keyup(function () {
        if ($(this).val() == '') {
            $('#btnAddUser').prop('disabled', true);
        }else {
            $('#btnAddUser').prop('disabled', false);
        }
    });

    $('#userName').keyup(function () {
        var checkedStatus = [];
        
        if ($(this).val() == '') {
            getCheckedStatus(checkedStatus);
            if (checkedStatus.length == 0){               
                $('#searchFilters').prop('disabled', true);
            }
        } else {
            $('#searchFilters').prop('disabled', false);
        }
    });

});

function getCheckedStatus(checked) {
    $('input:checkbox:checked').each(function () {
        checked.push($(this).val());
    });
}

function getUsers(type_user) {

    $.ajax({
        type: 'GET',
        url: "data/dataTableUsers.php",
        async: false,
        data: {user: type_user},
        success: function (text) {
            $('#usersTable').html(text);
        }
    });
}

function getStatusCheck() {
    $.ajax({
        type: 'GET',
        url: "data/getStatusCheck.php",
        async: false,
        success: function (text) {
            $('#statusUsers').html(text);
        }
    });
}

function searchUser(type_user){

    var msg  = $('#searchUser').serialize() + '&user=' + type_user;

    $.ajax({
        type: 'POST',
        url: "data/searchUser.php", 
        async: false,
        data: msg,
        success: function(text) {
            $('#usersTable').html(text);
        },
        error:  function(){
            alert('Ошибка!');
        }
    });
}

function addUser(type_user){
    $.ajax({
        type: 'POST',
        url: "data/addUser.php", 
        async: false,
        data: $('#addUserForm').serialize(),
        success: function(result) {
            if (result){
                getUsers(type_user);
            }
            $('#usersTable').html(text)
        },
        error:  function(){
            alert('Ошибка!');
        }
    });
}
