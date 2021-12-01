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
                        <label>Место проведения</label>
                        <input
                            v-model="place"
                            name="place"
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
                        <label>Время начала</label>
                        <input
                            v-model="time"
                            name="time"
                            type="time"
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
                    <h6 class="mb-2">Добавить нового игрока:</h6>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Фамилия</label>
                                <input
                                    v-model="newSurname"
                                    type="text"
                                    class="form-control"
                                />
                            </div>
                            <div class="col-3">
                                <label>Имя</label>
                                <input
                                    v-model="newName"
                                    type="text"
                                    class="form-control"
                                />
                            </div>

                            <div
                                class="col-6"
                                style="display: flex; align-items: end"
                            >
                                <button
                                    @click="addNew"
                                    type="button"
                                    class="btn btn-success float-left"
                                >
                                    Добавить
                                </button>
                            </div>
                        </div>
                    </div>
                    <h6 class="mb-2">Выбрать существующего игрока:</h6>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Поиск</label>
                                <v-select
                                    placeholder="Поиск..."
                                    v-model="currentPlayer"
                                    :options="options"
                                ></v-select>
                            </div>
                            <div
                                class="col-6"
                                style="display: flex; align-items: end"
                            >
                                <button
                                    @click="addExisting"
                                    type="button"
                                    class="btn btn-success float-left"
                                >
                                    Добавить
                                </button>
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-2">Список игроков</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Фамилия Имя</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(player, index) in playersList"
                                :key="index"
                            >
                                <td>
                                    {{ 1 + index }}
                                </td>
                                <td>
                                    {{ player.label }}
                                </td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm delete-btn"
                                        @click="deletePlayer(index)"
                                    >
                                        Удалить
                                        <i class="fas fa-trash"> </i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>

<script>
import moment from "moment";

export default {
    created() {
        this.start = this.date;
        this.category_id = this.categories[0].id;

        this.players.forEach((player) => {
            this.options.push({
                label: player.surname + " " + player.name,
                code: player.id,
            });
        });
    },
    props: ["date", "categories", "players"],
    data() {
        return {
            // tournament info
            title: "",
            start: new Date(),
            time: "00:00",
            category_id: 1,
            rank: "0",
            place: 'ТК "Хасанский"',
            // players
            playersList: [],
            // add new player
            newName: "",
            newSurname: "",
            // v-select
            currentPlayer: "",
            options: [],
        };
    },
    watch: {
        options: {
            handler: function () {},
            deep: true,
        },
    },
    methods: {
        deletePlayer(index) {
            console.log(index);
            this.playersList.splice(index, 1);
        },
        addNew() {
            if (this.newSurname == "" || this.newName == "") {
                return;
            }
            this.playersList.push({
                label: this.newSurname + " " + this.newName,
                code: 0,
            });

            this.newName = "";
            this.newSurname = "";
        },
        addExisting() {
            if (this.currentPlayer == "") {
                return;
            }
            this.playersList.push(this.currentPlayer);

            this.currentPlayer = "";
        },
        save() {
            console.log(this.time);
            const arrayOfStrings = this.time.split(":");
            const hours = parseInt(arrayOfStrings[0]);
            const minutes = parseInt(arrayOfStrings[1]);
            let newDateObj = moment(this.start).add(minutes, "m").toDate();
            newDateObj = moment(this.start).add(hours, "h").toDate();

            axios
                .post("/admin/tournament", {
                    title: this.title,
                    started_at: new Date(newDateObj),
                    category_id: this.category_id,
                    rank: this.rank,
                    place: this.place,
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
