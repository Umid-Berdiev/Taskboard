import Vue from 'vue';
import axios from 'axios';

const state = {
	tasks: [],
	task: null
}

const getters = {
	allTasks: state => state.tasks,
	activeTask: state => state.task
}

const actions = {
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
			dispatch('fetchTasks', res.data.taskboard_id);
		});
		// commit('newTask', response.data)
	},

	async updateTask({ commit }, updTask) {
		const response = await axios.post(`task/update/${updTask.id}`, updTask);
		// dispatch('fetchTasks', response.data.taskboard_id);
	},

	async deleteTask({ commit }, id) {
		await axios.post(`task/delete/${id}`).then(res => commit('REMOVE_TASK', id));
	}

}

const mutations = {
	SET_TASKS: (state, tasks) => state.tasks = tasks,
	GET_TASK: (state, task) => state.task = task,
	REMOVE_TASK(state, id) {
		const itemIdx = state.taskboard.tasks.findIndex(item => item.id == id);
		console.log(itemIdx);
	    // For existing item
	    if (itemIdx > -1)
	      Vue.delete(state.tasks, itemIdx);
    },
}

export default {
	state,
	getters,
	actions,
	mutations
}
