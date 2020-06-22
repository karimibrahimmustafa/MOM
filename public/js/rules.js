function remove_rule(id, token) {
    $.ajax({
        url: '/RemoveRule',
        method: 'POST',
        type: 'POST',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id,
            '_token': token
        },
        success: function(data) {
            console.log("delete");
            document.querySelector("#rule" + id).style.display = "none";
        }
    });
}