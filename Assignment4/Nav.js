function changeActive(e)//  referenced code to change active class from https://stackoverflow.com/questions/38990163/how-can-i-add-and-remove-an-active-class-to-an-element-in-pure-javascript/38990288
{
    document.querySelector('.active').classList.remove('active');

        e.target.classList.add('active'); 
        console.log("changed active");

}
 
