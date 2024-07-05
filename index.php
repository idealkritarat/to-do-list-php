<?php
$todoJSON__arr = [];
$todoURL = 'to_do_list.json';
if(file_exists($todoURL)){
    $todoJSON = file_get_contents($todoURL);
    $todoJSON__arr = json_decode($todoJSON,true);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body class="bg-neutral-200">
    <div class="container mx-auto h-full p-10">
        <div class="h-full w-full flex flex-col gap-3 mx-auto">
            <section>
                <form action="newTask.php" method="post" class="w-full shadow-xl bg-white p-10 grid grid-rows-2 gap-2 rounded-lg">
                    <input name="title" type="text" placeholder="What do you need to do?" class="border rounded-md py-2 px-4">
                    <button class="border border-blue-500 rounded-md text-blue-500 hover:bg-blue-500 hover:text-white flex items-center justify-center gap-2 transition">
                        <span>Add</span>
                        <span class="material-symbols-outlined">
                            add_circle
                        </span>
                    </button>
                </form>
            </section>
            <section>
                <ul id="list" class="h-full min-h-[500px] w-full shadow-xl bg-white p-10 rounded-lg flex flex-col gap-6">
                    <?php foreach ($todoJSON__arr as $title => $task__self): ?>
                        <li class="w-full rounded-md shadow-md p-5 flex items-center justify-center border">
                            <div class="flex justify-between items-center w-full">
                                <div class="flex items-center gap-3">
                                    <form action="checkboxTask.php" method="post">
                                        <input type="hidden" name="title" value="<?php echo $title ?>">
                                        <input type="checkbox" name="status" class="size-4" <?php echo $task__self['completed'] ? 'checked' : ''?> >
                                    </form>
                                    <span id="title"> <?php echo $title ?></span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <form action="deleteTask.php" method="post">
                                        <input type="hidden" name="title" value="<?php echo $title ?>">
                                        <button class="bg-red-700 text-white grid grid-flow-col place-items-center p-2 rounded-lg">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>
    </div>
    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox][name=status]');
        checkboxes.forEach(ch => {
            ch.onclick = function (){
                this.parentNode.submit();
            }
        });
    </script>
</body>
</html>