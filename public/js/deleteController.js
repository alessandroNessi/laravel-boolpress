const allButtons=document.getElementsByClassName('button-delete');
const deleteId=document.getElementById('id-to-delete');
// console.log(Array(allButtons));
Array.prototype.forEach.call(allButtons, function(element) {
    element.addEventListener("click", function(){ 
        // let id=this.getAttribute('carried-data');
        deleteId.value=this.getAttribute('carried-data');;
    });
});