$(document).ready(function(){

    $('#btn-add').click(function(){
        $('#editor').show();
    });

    $('#btn-cancel-county').click(function(){
        $('#name').show();
    });
})

function btnEditCountyOnClick(id, name) {
    document.getElementById('modified_county_id').value = id;
    document.getElementById('modified_county_name').value = name;
}
