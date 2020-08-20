<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple CRUD Laravel Vue</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .hidden {
            display: none;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;

            justify-content: center;
            margin-left: 20%;
            margin-right: 20%;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 80px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div id="app">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Student
                </div>
                <hr>
                <div class="alert alert-warning" role="alert" v-bind:class="{hidden: hasError}">
                    All fields are required!
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" required placeholder="Name" name="name"
                        v-model="newStudent.name">
                </div>

                <div class="form-group">
                    <label for="major">Major</label>
                    <input type="text" class="form-control" id="major" required placeholder="Major" name="major"
                        v-model="newStudent.major">
                </div>

                <button class="btn btn-primary m-b-md" @click.prevent="createStudent()">
                    Add Student
                </button>

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Major</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in students">
                            <th scope="row">@{{student.id}}</th>
                            <td>@{{student.name}}</td>
                            <td>@{{student.major}}</td>

                            <td @click="setVal(student.id, student.name, student.major)" class="btn btn-info"
                                class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i
                                    class="fa fa-pencil"></i>
                            </td>
                            <td @click.prevent="deleteStudent(student)" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Student</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">

                                <input type="hidden" disabled class="form-control" id="e_id" name="id" required
                                    :value="this.e_id">
                                Name: <input type="text" class="form-control" id="e_name" name="name" required
                                    :value="this.e_name">
                                Major: <input type="text" class="form-control" id="e_major" name="major" required
                                    :value="this.e_major">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="editStudent()">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/app.js"></script>
</body>

</html>