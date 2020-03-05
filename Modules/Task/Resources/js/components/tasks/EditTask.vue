<template>
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div v-if="activeTask">
                    <form @submit="onSubmit">
                        <div class="form-group">
                            <label>Task Name</label>
                            <input type="text" v-model="activeTask.task_title" class="form-control" value="Website Redesign">
                        </div>
                        <div class="form-group">
                            <label>Task Priority</label>
                            <select class="form-control select" v-model="activeTask.priority">
                                <option disabled="true">Select</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="date" v-model="activeTask.due_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Task Followers</label>
                            <input type="text" class="form-control" placeholder="Search to add">
                            <div class="task-follower-list">
                                <span data-toggle="tooltip" title="John Doe">
                                    <img src="assets\img\profiles\avatar-02.jpg" class="avatar" alt="John Doe" width="20" height="20">
                                    <i class="fa fa-times"></i>
                                </span>
                                <span data-toggle="tooltip" title="Richard Miles">
                                    <img src="assets\img\profiles\avatar-09.jpg" class="avatar" alt="Richard Miles" width="20" height="20">
                                    <i class="fa fa-times"></i>
                                </span>
                                <span data-toggle="tooltip" title="John Smith">
                                    <img src="assets\img\profiles\avatar-10.jpg" class="avatar" alt="John Smith" width="20" height="20">
                                    <i class="fa fa-times"></i>
                                </span>
                                <span data-toggle="tooltip" title="Mike Litorus">
                                    <img src="assets\img\profiles\avatar-05.jpg" class="avatar" alt="Mike Litorus" width="20" height="20">
                                    <i class="fa fa-times"></i>
                                </span>
                            </div>
                        </div>
                        <div class="submit-section text-center">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';

	export default {
		name: 'EditTask',
        computed: mapGetters(['activeTask']),
		methods: {
            ...mapActions(['fetchTask', 'updateTask']),
            onSubmit() {
                const obj = {
                    'id': this.activeTask.id,
                    'company_id': this.activeTask.company_id, 
                    'taskboard_id': this.activeTask.taskboard_id, 
                    'task_title': this.activeTask.task_title,
                    'priority': this.activeTask.priority, 
                    'due_date': this.activeTask.due_date
                };
                this.updateTask(obj);
            },
            setDateFormat(value) {
                // console.log(value);
                // let d = new Date(value);
                // let day = d.getDate();
                // let month = d.getMonth();
                // let year = d.getFullYear();
                // return `day-month-year`;
            }
        }
	}
</script>