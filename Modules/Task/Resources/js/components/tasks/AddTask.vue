<template>
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form @submit="onSubmit">
                    <div class="form-group">
                        <label>Task Name</label>
                        <input v-model="task_title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Task Priority</label>
                        <select v-model="priority" class="form-control select">
                            <option disabled="true">Select</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <div class="cal-icon">
                            <input v-model="due_date" class="form-control datetimepicker" type="date">
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
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        <!-- <button type="submit" class="btn btn-primary submit-btn">Submit</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';

    export default {
        name: 'AddTask',
        computed: mapGetters(['activeTaskboard']),
        data() {
            return {
                task_title: '',
                priority: null,
                due_date: null,
            }
        },
        methods: {
            ...mapActions(['addTask', 'fetchTaskboard']),
            onSubmit() {
                if (this.task_title && this.priority && this.due_date) {
                    let arr = {
                        'company_id': this.activeTaskboard.company_id, 
                        'taskboard_id': this.activeTaskboard.id, 
                        'task_title': this.task_title,
                        'priority': this.priority, 
                        'due_date': this.due_date
                    };
                    this.addTask(arr);
                }
            }
        },
        created() {
            this.fetchTaskboard()
        }

    };
</script>