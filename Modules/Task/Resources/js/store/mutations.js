import Vue from "vue"

export default {
	// taskboard
	SET_TASKBOARDS: (state, taskboards) => (state.taskboards = taskboards),
	GET_TASKBOARD: (state, taskboard) => (state.taskboard = taskboard),

	// task
	SET_TASKS: (state, tasks) => state.tasks = tasks,
	GET_TASK: (state, task) => state.task = task,
	REMOVE_TASK(state, task) {
		// console.log(task);
		state.taskboard.tasks.filter(item => item.id)
    },
}