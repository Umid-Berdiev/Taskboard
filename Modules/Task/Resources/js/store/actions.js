import axios from "axios";

export default {
	//taskboard
	async fetchTaskboards({ commit }, company_id) {
		const response = await axios.post(`taskboard/all`, { company_id });
		commit('SET_TASKBOARDS', response.data);
	},

	async fetchTaskboard({ commit }, taskboard) {
		commit('GET_TASKBOARD', taskboard);
	},

	async addTaskboard({ commit, dispatch }, [title, label_color]) {
		const response = await axios.post('taskboard/add', { title, label_color });
		dispatch('fetchTaskboards', response.data.company_id);
	},

	async updateTaskboard({dispatch, commit }, updTaskboard) {
		const response = await axios.post(`taskboard/update/${updTaskboard.id}`, updTaskboard);
	},

	async deleteTaskboard({dispatch, commit }, id) {
		// console.log(id)
		let response = await axios.post(`taskboard/delete/${id}`);
		dispatch('fetchTaskboards', response.data.company_id);
		// commit('removeTaskboard', id)
	},

	//task
	async fetchTasks({ commit }, taskboard_id) {
		const response = await axios.post('task/all', { taskboard_id });
		commit('SET_TASKS', response.data);
	},

	async fetchTask({ commit }, task) {
		let d = new Date(task.due_date);
        let day = d.getDate() < 10 ? `0${d.getDate()}` : d.getDate();
        let month = (d.getMonth()+1) < 10 ? `0${d.getMonth()+1}` : `${d.getMonth()+1}`;
        let year = d.getFullYear();
        task.due_date = `${year}-${month}-${day}`;
		// console.log(task.due_date);

		commit('GET_TASK', task);
	},

	async addTask({ commit, dispatch }, array) {
		await axios.post('task/add', { array }).then(res => {
			dispatch('fetchTaskboards', res.data.taskboard.company_id);
		});
		// commit('newTask', response.data)
	},

	async updateTask({ commit, dispatch }, updTask) {
		const response = await axios.post(`task/update/${updTask.id}`, updTask);
		dispatch('fetchTaskboards', response.data.taskboard.company_id);
	},

	async deleteTask({ commit, dispatch }, task) {
		await axios.post(`task/delete/${task.id}`)
					.then(res => dispatch('fetchTaskboards', res.data.taskboard.company_id));
	}
}
