<template>
	<!-- <div>
		<h3>Add Taskboard</h3>
		<div class="add">
			<form @submit.prevent="onSubmit">
				<input type="text" required="true" v-model="title" placeholder="Add Taskboard...">
				<input type="submit" value="Submit">
			</form>
		</div>
	</div> -->
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Task Board</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form @submit="onSubmit">
					<div class="form-group">
						<label>Task Board Name</label>
						<input v-model="name" type="text" required="true" class="form-control">
					</div>
					<div class="form-group task-board-color">
						<label for="label_color">Task Board Color</label>
						<!-- <div class="board-color-list">
							<label class="board-control board-primary">
								<input name="radio" type="radio" class="board-control-input" value="primary" checked="">
								<span class="board-indicator"></span>
							</label>
							<label class="board-control board-success">
								<input name="radio" type="radio" class="board-control-input" value="success">
								<span class="board-indicator"></span>
							</label>
							<label class="board-control board-info">
								<input name="radio" type="radio" class="board-control-input" value="info">
								<span class="board-indicator"></span>
							</label>
							<label class="board-control board-purple">
								<input name="radio" type="radio" class="board-control-input" value="purple">
								<span class="board-indicator"></span>
							</label>
							<label class="board-control board-warning">
								<input name="radio" type="radio" class="board-control-input" value="warning">
								<span class="board-indicator"></span>
							</label>
							<label class="board-control board-danger">
								<input name="radio" type="radio" class="board-control-input" value="danger">
								<span class="board-indicator"></span>
							</label>
						</div> -->
						<input v-model="label_color" id="label_color" type="color" class="form-control">
					</div>
					<div class="m-t-20 text-center">
						<button type="submit" class="btn btn-primary btn-lg">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapActions } from 'vuex';

	export default {

		name: 'AddTaskboard',
		data () {
			return {
				name: '',
				label_color: null
			}
		},

		methods: {
			...mapActions(['addTaskboard']),
			onSubmit() {
				if (this.name && this.label_color)
					this.addTaskboard([this.name, this.label_color])
			}
		}

	}
</script>

<style lang="css" scoped>
</style>