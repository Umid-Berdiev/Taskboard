<template>
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Hospital Admin</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Task Board</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <TaskboardHeader />

            <Taskboards />
        
        </div>
        <!-- /Page Content -->

        <div id="add_task_board" class="modal custom-modal fade" role="dialog">
            <AddTaskboard />
        </div>

        <div id="edit_task_board" class="modal custom-modal fade" role="dialog">
            <EditTaskboard />
        </div>

        <!-- <div id="new_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Project</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Project Name</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Create Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Assign Leader Modal -->
        <div id="assign_leader" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Leader to this project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search to add a leader" class="form-control search-input" type="text">
                            <span class="input-group-append">
                                <button class="btn btn-primary">Search</button>
                            </span>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar"><img alt="" src="assets\img\profiles\avatar-09.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Richard Miles</div>
                                                <span class="designation">Web Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar"><img alt="" src="assets\img\profiles\avatar-10.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">John Smith</div>
                                                <span class="designation">Android Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="" src="assets\img\profiles\avatar-16.jpg">
                                            </span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Jeffery Lalor</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Assign Leader Modal -->

        <!-- Assign User Modal -->
        <div id="assign_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign the user to this project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search a user to assign" class="form-control search-input" type="text">
                            <span class="input-group-append">
                                <button class="btn btn-primary">Search</button>
                            </span>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar"><img alt="" src="assets\img\profiles\avatar-09.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Richard Miles</div>
                                                <span class="designation">Web Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar"><img alt="" src="assets\img\profiles\avatar-10.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">John Smith</div>
                                                <span class="designation">Android Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="" src="assets\img\profiles\avatar-16.jpg">
                                            </span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Jeffery Lalor</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Assign User Modal -->

        <!-- Add Task Modal -->
        <div id="add_task_modal" class="modal custom-modal fade" role="dialog">
            <AddTask />
        </div>
        <!-- /Add Task Modal -->

        <!-- Edit Task Modal -->
        <div id="edit_task_modal" class="modal custom-modal fade" role="dialog">
            <EditTask />
        </div>
        <!-- /Edit Task Modal -->

    </div>
</template>

<script>
    import TaskboardHeader from './TaskboardHeader.vue';
    import AddTaskboard from './AddTaskboard.vue';
    import EditTaskboard from './EditTaskboard.vue';
    import Taskboards from './Taskboards.vue';
    import AddTask from '../tasks/AddTask.vue';
    import EditTask from '../tasks/EditTask.vue';

    export default {
        name: 'App',
        components: {
            TaskboardHeader,
            AddTaskboard,
            EditTaskboard,
            Taskboards,
            AddTask,
            EditTask
        }
    }
</script>

<style>

</style>
