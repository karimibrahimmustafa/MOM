function remove_worker(id, token) {
    $.ajax({
        url: '/RemoveId',
        method: 'POST',
        type: 'POST',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id,
            '_token': token
        },
        success: function(data) {
            document.querySelector("#worker" + id).style.display = "none";
        }
    });
}