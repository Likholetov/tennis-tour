<template>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="/admin/calendar" class="btn btn-secondary">Назад</a>
            <button
                @click="save"
                type="button"
                class="btn btn-success float-right"
            >
                Добавить турнир
            </button>
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Параметры турнира</h3>

                    <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="collapse"
                            title="Collapse"
                        >
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Название</label>
                        <input
                            v-model="title"
                            name="title"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group">
                        <label>Дата начала</label>
                        <input
                            v-model="start"
                            name="start"
                            type="date"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group">
                        <label>Дата завершения</label>
                        <input
                            v-model="end"
                            name="end"
                            type="date"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group">
                        <label>Разряд турнира</label>
                        <select
                            class="form-control custom-select"
                            v-model="category_id"
                        >
                            <option
                                v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            >
                                {{ category.title }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Категория турнира</label>
                        <select
                            class="form-control custom-select"
                            v-model="rank"
                        >
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Участники</h3>

                    <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="collapse"
                            title="Collapse"
                        >
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Название</label>
                        <input name="title" type="text" class="form-control" />
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.start = this.date;
        this.end = this.date;
        this.category_id = this.categories[0].id;
    },
    props: ["date", "categories"],
    data() {
        return {
            title: "",
            start: new Date(),
            end: new Date(),
            category_id: 1,
            rank: "0",
            loading: false,
        };
    },
    methods: {
        save() {
            axios
                .post("/admin/tournament", {
                    title: this.title,
                    started_at: this.start,
                    ended_at: this.end,
                    category_id: this.category_id,
                    rank: this.rank,
                })
                .then((res) => {
                    window.location.href = `/admin/calendar`;
                    console.log(res);
                })
                .catch((err) => {
                    //this.loading = false;
                    console.log(err);
                });
        },
    },
};
</script>

<style></style>
