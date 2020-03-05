<template>
	<div class="kanban-board card mb-0">
		<div class="card-body">
			<div class="kanban-cont">
				<div v-for="taskboard in allTaskboards.taskboards" :key="taskboard.id" class="kanban-list kanban-danger">
					<div class="kanban-header" :style="{ backgroundColor: taskboard.label_color }">
						<span class="status-title" v-text="taskboard.name"></span>
						<div class="dropdown kanban-action">
							<a href="" data-toggle="dropdown">
								<i class="fa fa-ellipsis-v"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#edit_task_board" @click="fetchTaskboard(taskboard)">Edit</a>
								<a class="dropdown-item" href="javascript:void(0);" @click="deleteTaskboard(taskboard.id)">Delete</a>
							</div>
						</div>
					</div>
					<Tasks :tasks="taskboard.tasks" />
					<div class="add-new-task">
						<a href="javascript:void(0);" data-toggle="modal" data-target="#add_task_modal" @click="fetchTaskboard(taskboard)">Add New Task</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex';
    import Tasks from '../tasks/Tasks.vue';
	
	export default {
		name: 'Taskboards',
		components: {
			Tasks
		},
		data() {
			return {
				company_id: 1,
			}
		},
		methods: {
			...mapActions(['fetchTaskboards', 'fetchTaskboard', 'deleteTaskboard', 'updateTaskboard']),
		},
		computed: mapGetters(['allTaskboards']),	
		created() {
			this.fetchTaskboards(this.company_id)
		}
	};
</script>
