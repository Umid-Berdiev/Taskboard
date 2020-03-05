<template>
	<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Task Board</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div v-if="activeTaskboard">
                	<form @submit="onSubmit">
	                    <div class="form-group">
	                        <label>Task Board Name</label>
	                        <input v-model="activeTaskboard.name" type="text" required="true" class="form-control">
	                    </div>
	                    <div class="form-group task-board-color">
	                        <label>Task Board Color</label>
	                        <input v-model="activeTaskboard.label_color" type="color">
	                    </div>
	                    <div class="m-t-20 text-center">
	                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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
		name: 'EditTaskboard',
		computed: mapGetters(['activeTaskboard']),
		methods: {
			...mapActions(['fetchTaskboard', 'updateTaskboard']),
			onSubmit() {
				const updTaskboard = {
					id: this.activeTaskboard.id,
					name: this.activeTaskboard.name,
					label_color: this.activeTaskboard.label_color
				};
				this.updateTaskboard(updTaskboard);
			},
		},
		created() {
			this.fetchTaskboard()
		}
	}
</script>

<style lang="css" scoped>
</style>