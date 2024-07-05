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
                <div class="w-full shadow-xl bg-white p-10 grid grid-rows-2 gap-2 rounded-lg">
                    <input type="text" placeholder="What do you need to do?" class="border rounded-md py-2 px-4">
                    <button class="border border-blue-500 rounded-md text-blue-500 hover:bg-blue-500 hover:text-white flex items-center justify-center gap-2 transition">
                        <span>Add</span>
                        <span class="material-symbols-outlined">
                            add_circle
                        </span>
                    </button>
                </div>
            </section>
            <section>
                <ul id="list" class="h-full min-h-[500px] w-full shadow-xl bg-white p-10 rounded-lg flex flex-col gap-6">
                    <?php 
                        $file_path = "./to_do_list.json";
                        $json = file_get_contents($file_path);
                        $todolist_arr = json_decode($json);
                        foreach ($todolist_arr as $task) {
                            echo '
                            <li class="w-full rounded-md shadow-xl p-5 flex items-center justify-center border">
                                <div class="flex justify-between items-center w-full">
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" class="size-4" '.($task->Checked ? "checked" : "").'>
                                        <span> '.$task->title.'</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <button class="bg-blue-500 text-white grid grid-flow-col place-items-center p-2 rounded-lg">
                                            <span class="material-symbols-outlined">
                                                edit_square
                                            </span>
                                        </button>
                                        <button class="bg-red-700 text-white grid grid-flow-col place-items-center p-2 rounded-lg">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            ';
                        }
                    ?>
                </ul>
            </section>
        </div>
    </div>
</body>
</html>