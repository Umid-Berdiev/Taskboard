<template>
	<div class="kanban-wrap">
		<div v-for="task in tasks" :key="task.id" class="card panel">
			<div class="kanban-box">
				<div class="task-board-header">
					<span class="status-title"><a href="task-view.html" v-text="task.task_title"></a></span>
					<div class="dropdown kanban-task-action">
						<a href="" data-toggle="dropdown">
							<i class="fa fa-angle-down"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#edit_task_modal" @click="fetchTask(task)">Edit</a>
							<a class="dropdown-item" href="javascript:void(0);" @click="deleteTask(task)">Delete</a>
						</div>
					</div>
				</div>
				<div class="task-board-body">
					<div class="kanban-info">
						<div class="progress progress-xs">
							<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<span>70%</span>
					</div>
					<div class="kanban-footer">
						<span class="task-info-cont">
							<span class="task-date" v-text="task.start_date"><i class="fa fa-clock-o"></i> Sep 26</span>
							<span class="task-priority badge bg-inverse-danger" v-text="task.priority">High</span>
						</span>
						<span class="task-users">
							<img src="assets\img\profiles\avatar-12.jpg" class="task-avatar" width="24" height="24">
							<!-- <img :src="task.user.photo" class="task-avatar" width="24" height="24"> -->
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex';

	export default {
		name: "Tasks",
		props: [
			'tasks'
		],
		methods: {
			...mapActions(['fetchTasks', 'fetchTask', 'deleteTask', 'updateTask']),
		},
	};
</script>