function deleteButtonPressed($postID){
    if(confirm("Are you sure want to delete this post?") == true){
        window.location='delete/'+$postID
    }
}

function taskDeleteButtonPressed($taskID){
    if(confirm("Are you sure want to delete this task?") == true){
        window.location='tasks/delete/'+$taskID
    }
}