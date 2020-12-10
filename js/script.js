// //setting variables
// let theInput = document.querySelector(".newTask input"),
//     addButton = document.querySelector(".newTask .add"),
//     container =  document.querySelector(".content"),
//     counter = document.querySelector(".counter span"),
//     completed = document.querySelector(".completed span");


// //Input Field Focus
// window.onload = function ()
// {
//     theInput.focus();
// };

// //Adding new task
// addButton.onclick = function () 
// {
//     if (theInput.value === '')
//     { //If Empty make sweet alert

//         swal("Error!");
//     }
//     else
//     {
//         let empty = document.querySelector(".empty");

//         if (document.body.contains(empty))
//         {
//             empty.remove();
//         }
        

//         let mainSpan = document.createElement("span");          //create main span Element
//         let deleteElement = document.createElement("span");     // Create delete button
//         let text = document.createTextNode(theInput.value);     // Create main span text
//         let deleteText = document.createTextNode("Delete");     // Create delete button
       
//         mainSpan.appendChild(text);                             //Add Text to main span
//         mainSpan.className = "task";                            //Add class to main span
//         deleteElement.appendChild(deleteText);                  //Add Text to delete button
//         deleteElement.className = "delete";                     //Add class delete button
//         mainSpan.appendChild(deleteElement);                    //Add delete button to Main span
//         container.appendChild(mainSpan);                        //Add task to container
        
//         theInput.value = "";                                    //Empty the field
//         theInput.focus();   
//         taskCounter();                                    //Focus Again
//     }
// };

// document.addEventListener('click', function (e){
//     if (e.target.className == 'delete')
//     {
//         // console.log('this is');
//         //removing task
//         e.target.parentNode.remove();
//         localStorage.clearItem();
//         //check number of task
//         if(container.childElementCount == 0)
//         {
//             createNoTask();
//         }
//     }
//         //Finishing task
//     if (e.target.classList.contains('task'))
//     {
//         //togle class 'finished'
//         e.target.classList.toggle("finished");
//     }
//     taskCounter();
// });

// //Function to create no tasks

// function createNoTask()
// {
//     let msgSpan = document.createElement("span"), 
//         msgText = document.createTextNode("Add New Task");
        
//     msgSpan.appendChild(msgText);
//     msgSpan.className = 'empty';

//     container.appendChild(msgSpan);
// }

// function taskCounter()
// {
//     //All Tasks
//     counter.innerHTML = document.querySelectorAll('.content .task').length;
//     //Completed Tasks
//     completed.innerHTML = document.querySelectorAll('.content .finished').length;
// }


document.querySelector("span.add").addEventListener("click", () => {
    document.forms[0].submit();
})
let xhr;
document.getElementById("search").addEventListener("keyup", () => {
    let search = document.getElementById("search").value; //ahmed
    xhr = new XMLHttpRequest();
    // console.log(xhr, "xhr");
    let data = "search=" + search; //search = p
    xhr.open("POST", "search.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
    // console.log(data);
    // console.log(xhr.responseText);
    // console.log(xhr.response)
    let result;
    let container =  document.querySelector(".content#show_search");
    let mainSpan = document.createElement("span");          //create main span Element
    let deleteElement = document.createElement("span");     // Create delete button
    let editElement = document.createElement("span");     // Create delete button
    let text;    // Create main span text
    let deleteText = document.createTextNode("Delete");     // Create delete button
    let editText = document.createTextNode("Edit");     // Create delete button
    xhr.onreadystatechange = display_data;
    function display_data() { 
        console.log(xhr);
        // console.log(JSON.parse(xhr.responseText)[0].post);
        let tasks = document.querySelectorAll(".task");
        if(document.getElementById("search").value.length > 0)
        {
            console.log("inside if");
            result = JSON.parse(xhr.responseText);
            // console.log(result[0].post);
            for(let it = 0; it < result.length; ++it)
            {
                console.log(result[it].post);
                text = document.createTextNode(result[it].post); 
                mainSpan.appendChild(text);                             //Add Text to main span
                mainSpan.className = "searchtask";                            //Add class to main span
                deleteElement.appendChild(deleteText);                  //Add Text to delete button
                deleteElement.className = "delete";  
                editElement.appendChild(editText);
                editElement.className = "edit";                         //Add class delete button
                mainSpan.appendChild(deleteElement);                    //Add delete button to Main span
                mainSpan.appendChild(editElement);                    //Add delete button to Main span
                container.appendChild(mainSpan);                        //Add task to container
                /*container.appendChild(`${result[it].post}<a href="delete.php?id=${result[it].id}"><span class="delete">Delete</span></a>
                <a href="edit.php?id=${result[it]}.id"><span class="edit">Edit</span></a>`)*/
            }
            for(it in tasks)
            {
                tasks[it].style.display = "none";
            }
        }
        else
        {
            console.log("inside else");
            for(it in tasks)
            {
                tasks[it].style.display = "block";
            }
        } 
    }
});

// let container =  document.querySelector(".content#show_search");
// let mainSpan = document.createElement("span");          //create main span Element
// let deleteElement = document.createElement("span");     // Create delete button
// let editElement = document.createElement("span");     // Create delete button
// let text;    // Create main span text
// let deleteText = document.createTextNode("Delete");     // Create delete button
// let editText = document.createTextNode("Edit"); 
// text = document.createTextNode("testfortest"); 
// mainSpan.appendChild(text);                             //Add Text to main span
// mainSpan.className = "searchtask";                            //Add class to main span
// deleteElement.appendChild(deleteText);                  //Add Text to delete button
// deleteElement.className = "delete";  
// editElement.appendChild(editText);
// editElement.className = "edit";                         //Add class delete button
// mainSpan.appendChild(deleteElement);                    //Add delete button to Main span
// mainSpan.appendChild(editElement);                    //Add delete button to Main span
// container.appendChild(mainSpan); 