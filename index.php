<!doctype html>
<html lang="en">

<head>
    <title>Crud operation with ajax</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


    <div class="container mt-4">
        <div class="row justify-content-center mt-1">
            <div class="col-sm-6 mt-3">
                <h1 class="text-center">Student Info</h1>

                <div class="text-end p-2">
                    <button class="btn btn-primary " id="Addclass">Add new student</button>
                </div>

                <table class="table bg-black text-white ">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                </table>
            </div>
            <!-- pop up model -->
            <div class="modal" tabindex="-1" id="StudentModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add new stuents</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <form id="studentForm">

                                <div class="from-group m-2 ">
                                    <!-- <label for="name">Id</label> -->
                                    <input type="text" name="id" id="id" class="form-control "
                                        placeholder="Enter Sutent id">
                                </div>

                                <div class="from-group m-2 ">
                                    <!-- <label for="name">  Name</label> -->
                                    <input type="text" name="name" id="name" class="form-control "
                                        placeholder="Enter Sutent name">
                                </div>

                                <div class="from-group m-2 ">
                                    <!-- <label for="name">  Name</label> -->
                                    <input type="text" name="class" id="class" class="form-control "
                                        placeholder="Enter Sutent class">
                                </div>







                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>





    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- JavaScript file -->
    <script src="main.js"></script>

    <!-- <-- Bootstrap JavaScript file  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>