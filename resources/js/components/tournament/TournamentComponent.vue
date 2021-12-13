<template>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="/admin/calendar" class="btn btn-secondary">Назад</a>
            <button
                @click="save"
                type="button"
                class="btn btn-success float-right"
            >
                Сохранить
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
                        <label>Дата завершения</label>
                        <input
                            v-model="end"
                            name="end"
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
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="checkbox1"
                            v-model="isGroups"
                        />
                        <label class="form-check-label" for="checkbox1"
                            >Групповой этап</label
                        >
                    </div>
                    <div v-if="isGroups" class="form-group mt-3">
                        <label>Количество игроков в группе</label>
                        <input
                            v-model="groupAmount"
                            name="title"
                            type="number"
                            class="form-control"
                        />
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
                            <div class="col-3">
                                <label>Отчество</label>
                                <input
                                    v-model="newPatronimic"
                                    type="text"
                                    class="form-control"
                                />
                            </div>

                            <div
                                class="col-3"
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

                    <h6 class="mb-2">Список игроков</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Фамилия Имя Отчество</th>
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
                                        @click="
                                            deletePlayer(
                                                index,
                                                player.label,
                                                player.code
                                            )
                                        "
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
        <div v-if="isGroups" class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Группы</h3>

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
                    <div v-for="(group, key) in groups" :key="'group' + key">
                        <h5 class="mb-2">{{ group.name }}</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Фамилия Имя Отчество</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(player, index) in group.players"
                                    :key="group.name + index"
                                >
                                    <td>
                                        {{ 1 + index }}
                                    </td>
                                    <td>
                                        <select
                                            v-if="group.players[index] == ''"
                                            class="form-control custom-select"
                                            v-model="group.players[index]"
                                        >
                                            <option value="">Не выбрано</option>
                                            <option
                                                v-for="(
                                                    player, key1
                                                ) in playersListGroups"
                                                :key="
                                                    group.name +
                                                    index +
                                                    'player' +
                                                    key1
                                                "
                                                :value="player"
                                            >
                                                {{ player.label }}
                                            </option>
                                        </select>
                                        <div
                                            style="
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                            "
                                            v-if="group.players[index] != ''"
                                        >
                                            {{ group.players[index].label }}
                                            <button
                                                type="button"
                                                class="
                                                    btn btn-danger btn-sm
                                                    delete-btn
                                                "
                                                @click="
                                                    removePlayerFromGroup(
                                                        key,
                                                        index
                                                    )
                                                "
                                            >
                                                Удалить
                                                <i class="fas fa-trash"> </i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
        this.start = moment(this.date).format("YYYY-MM-DD");
        this.end = moment(this.date).format("YYYY-MM-DD");
        this.category_id = this.categories[0].id;

        this.players.forEach((player) => {
            this.options.push({
                label:
                    player.surname +
                    " " +
                    player.name +
                    " " +
                    player.patronimic,
                code: player.id,
            });
        });

        if (this.tournament) {
            console.log(this.tournamentgroups);
            const started = new Date(this.tournament.started_at * 1000);
            const ended = new Date(this.tournament.ended_at * 1000);

            this.title = this.tournament.title;

            this.start = moment(started).format("YYYY-MM-DD");
            this.end = moment(ended).format("YYYY-MM-DD");
            let minutes;
            let hours;
            started.getMinutes() < 10
                ? (minutes = "0" + started.getMinutes())
                : (minutes = "" + started.getMinutes());
            started.getHours() < 10
                ? (hours = "0" + started.getHours())
                : (hours = "" + started.getHours());
            const timeStr = "" + hours + ":" + minutes;
            this.time = timeStr;
            this.rank = "" + this.tournament.rank;
            this.place = this.tournament.place;
            this.category_id = this.tournament.category_id;
            this.isGroups = this.tournament.is_groups;
            this.groupAmount = this.tournament.group_amount;

            if (this.tournamentgroups && this.tournamentgroups.length > 0) {
                this.groups = [];

                this.tournamentgroups.forEach((group) => {
                    let playersFromDb = [];

                    group.players.forEach((element) => {
                        playersFromDb.push({
                            label:
                                element.surname +
                                " " +
                                element.name +
                                " " +
                                element.patronymic,
                            code: element.id,
                        });
                    });

                    if (playersFromDb.length < this.groupAmount) {
                        let count = this.groupAmount - playersFromDb.length;
                        for (let index = 0; index < count; index++) {
                            playersFromDb.push("");
                        }
                    }

                    console.log(playersFromDb);

                    this.groups.push({
                        name: group.title,
                        players: playersFromDb,
                    });
                });
            }
        }

        if (this.participants && this.participants.length > 0) {
            this.participants.forEach((element) => {
                this.playersList.push({
                    label:
                        element.surname +
                        " " +
                        element.name +
                        " " +
                        element.patronymic,
                    code: element.id,
                });
            });
        }
    },
    props: [
        "date",
        "categories",
        "players",
        "participants",
        "tournament",
        "tournamentgroups",
    ],
    data() {
        return {
            // tournament info
            title: "",
            start: new Date(),
            end: new Date(),
            time: "00:00",
            category_id: 1,
            rank: "0",
            place: 'ТК "Хасанский"',
            // players
            playersList: [],
            // add new player
            newName: "",
            newSurname: "",
            newPatronimic: "",
            // v-select
            currentPlayer: "",
            options: [],
            // groups
            playersListGroups: [],
            isGroups: false,
            groupAmount: 4,
            groupTitles: [
                "Группа А",
                "Группа Б",
                "Группа В",
                "Группа Г",
                "Группа Д",
                "Группа Е",
                "Группа Ж",
                "Группа З",
                "Группа И",
                "Группа К",
            ],
            groups: [
                {
                    name: "Группа А",
                    players: ["", "", "", ""],
                },
            ],
        };
    },
    watch: {
        groupAmount: {
            handler: function () {
                if (this.groupAmount != "" && this.groupAmount > 0) {
                    this.groups.forEach((group) => {
                        if (
                            group.players.length > Math.trunc(this.groupAmount)
                        ) {
                            group.players.length = Math.trunc(this.groupAmount);
                        } else {
                            let count =
                                Math.trunc(this.groupAmount) -
                                group.players.length;
                            for (let index = 0; index < count; index++) {
                                group.players.push("");
                            }
                        }
                    });
                    this.countGroups();
                }
            },
        },
        options: {
            handler: function () {},
            deep: true,
        },
        groups: {
            handler: function () {
                this.refreshSelectListGroups();
                console.log(1);
            },
            deep: true,
        },
        playersList: {
            handler: function () {
                this.countGroups();
                this.refreshSelectListGroups();
            },
            deep: true,
        },
        playersListGroups: {
            handler: function () {},
            deep: true,
        },
    },
    methods: {
        removePlayerFromGroup(key, index) {
            this.groups[key].players[index] = "";
            this.refreshSelectListGroups();
            this.newName = " ";
            this.newName = "";
        },
        refreshSelectListGroups() {
            let selectedPlayers = [];

            this.groups.forEach((group) => {
                group.players.forEach((player) => {
                    if (player != "") {
                        selectedPlayers.push(player);
                    }
                });
            });

            let difference = this.playersList.filter(
                (x) => !selectedPlayers.includes(x)
            );

            this.playersListGroups = difference;
        },
        countGroups() {
            let groupsCount = Math.ceil(
                this.playersList.length / this.groupAmount
            );
            const currentGroupsCount = this.groups.length;

            if (groupsCount < 1) {
                groupsCount = 1;
            }

            if (groupsCount > currentGroupsCount) {
                const newItemsCount = groupsCount - currentGroupsCount;

                for (let index = 0; index < newItemsCount; index++) {
                    const newGroupPlayers = [];

                    for (
                        let index_1 = 0;
                        index_1 < this.groupAmount;
                        index_1++
                    ) {
                        newGroupPlayers.push("");
                    }

                    this.groups.push({
                        name: this.groupTitles[currentGroupsCount],
                        players: newGroupPlayers,
                    });
                }
            }

            if (groupsCount < currentGroupsCount) {
                this.groups.length = groupsCount;
            }
        },
        deletePlayer(index, name, id) {
            this.playersList.splice(index, 1);

            this.groups.forEach((group, index) => {
                group.players.forEach((player, key) => {
                    if (player.label == name && player.code == id) {
                        this.groups[index].players[key] = "";
                    }
                });
            });

            console.log(this.groups);
        },
        addNew() {
            if (
                this.newSurname == "" ||
                this.newName == "" ||
                this.newPatronimic == ""
            ) {
                return;
            }
            this.playersList.push({
                label:
                    this.newSurname +
                    " " +
                    this.newName +
                    " " +
                    this.newPatronimic,
                code: 0,
            });

            const playersCount = this.options.length;

            this.newName = "";
            this.newSurname = "";
            this.newPatronimic = "";
        },
        addExisting() {
            if (this.currentPlayer == "") {
                return;
            }
            this.playersList.push(this.currentPlayer);

            this.currentPlayer = "";
        },
        save() {
            const arrayOfStrings = this.time.split(":");
            const hours = parseInt(arrayOfStrings[0]);
            const minutes = parseInt(arrayOfStrings[1]);
            let newDateObj = moment(this.start).add(minutes, "m").toDate();
            newDateObj = moment(this.start).add(hours, "h").toDate();
            let newDateObjEnd = moment(this.end).toDate();

            if (this.tournament) {
                axios
                    .patch(`/admin/tournament/${this.tournament.id}`, {
                        title: this.title,
                        started_at: new Date(newDateObj),
                        ended_at: new Date(newDateObjEnd),
                        category_id: this.category_id,
                        rank: this.rank,
                        place: this.place,
                        players: this.playersList,
                        groups: this.groups,
                        is_groups: this.isGroups,
                        group_amount: this.groupAmount,
                    })
                    .then((res) => {
                        window.location.href = `/admin/calendar`;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            } else {
                axios
                    .post("/admin/tournament", {
                        title: this.title,
                        started_at: new Date(newDateObj),
                        ended_at: new Date(newDateObjEnd),
                        category_id: this.category_id,
                        rank: this.rank,
                        place: this.place,
                        players: this.playersList,
                        groups: this.groups,
                        is_groups: this.isGroups,
                        group_amount: this.groupAmount,
                    })
                    .then((res) => {
                        window.location.href = `/admin/calendar`;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },
    },
};
</script>
