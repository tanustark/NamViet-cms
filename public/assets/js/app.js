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

function successButtonPressed($taskID){
    if(confirm("Are you sure complete this task?") == true){
        window.location='/tasks/success/'+$taskID
    }
}

function notSuccessButtonPressed($taskID){
    if(confirm("Are you sure this task is not completed?") == true){
        window.location='tasks/notsuccess/'+$taskID
    }
}

function deleteStaffButtonPressed($staffID){
    if(confirm("Are you sure want to delete this staff?") == true){
        window.location='staffs/delete/'+$staffID
    }
}

function commentDeleteButtonPressed($cmtID){
    if(confirm("Are you sure want to delete this comment") == true){
        window.location='/comments/delete/'+$cmtID
    }
}