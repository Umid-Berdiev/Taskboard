<template>
	<div class="row board-view-header">
        <div class="col-4">
            <div class="pro-teams">
                <div class="pro-team-lead">
                    <h4>Lead</h4>
                    <div class="avatar-group">
                        <div class="avatar">
                            <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-11.jpg">
                        </div>
                        <div class="avatar">
                            <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-01.jpg">
                        </div>
                        <div class="avatar">
                            <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-16.jpg">
                        </div>
                        <div class="avatar">
                            <a href="" class="avatar-title rounded-circle border border-white" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pro-team-members">
                    <h4>Team</h4>
                    <div class="avatar-group">
                        <div class="avatar">
                            <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-02.jpg">
                        </div>
                        <div class="avatar">
                            <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-09.jpg">
                        </div>
                        <div class="avatar">
                            <img class="avatar-img rounded-circle border border-white" alt="User Image" src="assets\img\profiles\avatar-12.jpg">
                        </div>
                        <div class="avatar">
                            <a href="" class="avatar-title rounded-circle border border-white" data-toggle="modal" data-target="#assign_user"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 text-right">
            <a href="#" class="btn btn-white float-right ml-2" data-toggle="modal" data-target="#add_task_board"><i class="fa fa-plus"></i> Create List</a>
            <a href="project-view.html" class="btn btn-white float-right" title="View Board"><i class="fa fa-link"></i></a>
        </div>

        <div class="col-12">
            <div class="pro-progress">
                <div class="pro-progress-bar">
                    <h4>Progress</h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 20%"></div>
                    </div>
                    <span>20%</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		name: 'TaskboardHeader',
		data() {
			return {
				
			}
		}
	}
</script>