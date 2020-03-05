import axios from 'axios'

const state = {
	taskboards: [],
	taskboard: null
}

const getters = {
	allTaskboards: state => state.taskboards,
	activeTaskboard: state => state.taskboard
}

const actions = {
	async fetchTaskboards({ commit }, company_id) {
		const response = await axios.post(`taskboard/all`, { company_id });
		commit('SET_TASKBOARDS', response.data);
	},

	async fetchTaskboard({ commit }, taskboard) {
		commit('GET_TASKBOARD', taskboard);
	},

	async addTaskboard({ commit }, [title, label_color]) {
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
	}
}

const mutations = {
	SET_TASKBOARDS: (state, taskboards) => (state.taskboards = taskboards),
	GET_TASKBOARD: (state, taskboard) => (state.taskboard = taskboard),
}

export default {
	state,
	getters,
	actions,
	mutations
}
