
function maxLengthCheck(object)
{
    if (object.value.length > object.maxLength)
    object.value = object.value.slice(0, object.maxLength)
}

function validate() {
    var element = document.getElementById('nombre');
    element.value = element.value.replace(/[^a-zA-Z0\s]+/, '');
};