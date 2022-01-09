<template>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="/admin" class="btn btn-secondary">Назад</a>
            <button
                @click="save"
                type="button"
                class="btn btn-success float-right"
            >
                Сохранить
            </button>
        </div>

        <div class="col-md-12">
            <div
                class="card card-secondary"
                v-for="(round, index) in currentTemplate"
                :key="'rounds' + index"
                v-bind:class="{
                    'collapsed-card': round.collapsed,
                }"
            >
                <div class="card-header">
                    <h3 class="card-title">Круг {{ round.order }}</h3>

                    <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            @click="round.collapsed = !round.collapsed"
                            title="Collapse"
                        >
                            <i
                                class="fas"
                                v-bind:class="{
                                    'fa-plus': round.collapsed,
                                    'fa-minus': !round.collapsed,
                                }"
                            ></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="padding: 5px">
                    <div
                        class="card card-primary"
                        v-for="(tennisMatch, key) in round.tennisMatches"
                        :key="'tennisMatches' + key"
                        v-bind:class="{
                            'collapsed-card': tennisMatch.collapsed,
                        }"
                    >
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ tennisMatch.title }}
                                {{ getSurname(tennisMatch.player1) }} -
                                {{ getSurname(tennisMatch.player2) }}
                            </h3>

                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    @click="
                                        tennisMatch.collapsed =
                                            !tennisMatch.collapsed
                                    "
                                    title="Collapse"
                                >
                                    <i
                                        class="fas"
                                        v-bind:class="{
                                            'fa-plus': tennisMatch.collapsed,
                                            'fa-minus': !tennisMatch.collapsed,
                                        }"
                                    ></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Параметр</th>
                                        <th>Значение</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>№ корта (ожид.)</td>
                                        <td>
                                            <input
                                                v-model="
                                                    tennisMatch.expected_court
                                                "
                                                type="text"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>№ корта</td>
                                        <td>
                                            <input
                                                v-model="tennisMatch.court"
                                                type="text"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Игрок 1</td>
                                        <td>
                                            <select
                                                class="
                                                    form-control
                                                    custom-select
                                                "
                                                v-model="tennisMatch.player1"
                                            >
                                                <option value="">
                                                    Не выбрано
                                                </option>
                                                <option
                                                    v-for="(
                                                        player, key1
                                                    ) in players"
                                                    :key="
                                                        'tennisMatch.title'
                                                            .key +
                                                        'playerone' +
                                                        key1
                                                    "
                                                    :value="player.id"
                                                >
                                                    {{
                                                        player.surname +
                                                        " " +
                                                        player.name[0]
                                                    }}{{
                                                        player.patronymic
                                                            ? " " +
                                                              player
                                                                  .patronymic[0]
                                                            : ""
                                                    }}
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Игрок 2</td>
                                        <td>
                                            <select
                                                class="
                                                    form-control
                                                    custom-select
                                                "
                                                v-model="tennisMatch.player2"
                                            >
                                                <option value="">
                                                    Не выбрано
                                                </option>
                                                <option
                                                    v-for="(
                                                        player, key1
                                                    ) in players"
                                                    :key="
                                                        'tennisMatch.title'
                                                            .key +
                                                        'playertwo' +
                                                        key1
                                                    "
                                                    :value="player.id"
                                                >
                                                    {{
                                                        player.surname +
                                                        " " +
                                                        player.name[0]
                                                    }}{{
                                                        player.patronymic
                                                            ? " " +
                                                              player
                                                                  .patronymic[0]
                                                            : ""
                                                    }}
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Счет</td>
                                        <td>
                                            <input
                                                v-model="tennisMatch.score"
                                                type="text"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>нач. разм.</td>
                                        <td>
                                            <input
                                                v-model="tennisMatch.warm_up"
                                                type="time"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>нач. игры</td>
                                        <td>
                                            <input
                                                v-model="tennisMatch.start"
                                                type="time"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>окон. игры</td>
                                        <td>
                                            <input
                                                v-model="tennisMatch.end"
                                                type="time"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12 mb-3">
            <button
                @click="save"
                type="button"
                class="btn btn-success float-right"
            >
                Сохранить
            </button>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        console.log(this.groups);
        console.log(this.players);

        if (this.existingmatches.length > 0) {
            this.existingmatches.forEach((existingmatch) => {
                this.tennisMatches.forEach((tennisMatch, key) => {
                    if (
                        existingmatch.title.localeCompare(tennisMatch.title) ==
                        0
                    ) {
                        this.tennisMatches[key] = {
                            expected_court: existingmatch.expected_court,
                            court: existingmatch.court,
                            title: existingmatch.title,
                            player1: existingmatch.player_one_id,
                            player2: existingmatch.player_two_id,
                            score: existingmatch.score,
                            warm_up: existingmatch.warm_up,
                            start: existingmatch.start,
                            end: existingmatch.end,
                        };
                    }
                });
            });
        } else {
            this.setGroups();
        }
    },
    props: ["tournament", "groups", "players", "existingmatches"],
    data() {
        return {
            rounds: [],
            tennisMatches: [],
            playersListGroups: [],
            currentTemplate: {},
            templates: [
                {
                    amount: 4,
                    rounds: [
                        {
                            order: 1,
                            collapsed: false,
                            tennisMatches: [
                                {
                                    expected_court: "",
                                    court: "",
                                    title: "A1-A4",
                                    player1: "",
                                    player2: "",
                                    score: "",
                                    warm_up: "00:00",
                                    start: "00:00",
                                    end: "00:00",
                                    collapsed: false,
                                },
                                {
                                    expected_court: "",
                                    court: "",
                                    title: "A2-A3",
                                    player1: "",
                                    player2: "",
                                    score: "",
                                    warm_up: "00:00",
                                    start: "00:00",
                                    end: "00:00",
                                    collapsed: false,
                                },
                            ],
                        },
                        {
                            order: 2,
                            collapsed: false,
                            tennisMatches: [
                                {
                                    expected_court: "",
                                    court: "",
                                    title: "A1-A3",
                                    player1: "",
                                    player2: "",
                                    score: "",
                                    warm_up: "00:00",
                                    start: "00:00",
                                    end: "00:00",
                                    collapsed: false,
                                },
                                {
                                    expected_court: "",
                                    court: "",
                                    title: "A2-A4",
                                    player1: "",
                                    player2: "",
                                    score: "",
                                    warm_up: "00:00",
                                    start: "00:00",
                                    end: "00:00",
                                    collapsed: false,
                                },
                            ],
                        },
                        {
                            order: 3,
                            collapsed: false,
                            tennisMatches: [
                                {
                                    expected_court: "",
                                    court: "",
                                    title: "A1-A2",
                                    player1: "",
                                    player2: "",
                                    score: "",
                                    warm_up: "00:00",
                                    start: "00:00",
                                    end: "00:00",
                                    collapsed: false,
                                },
                                {
                                    expected_court: "",
                                    court: "",
                                    title: "A3-A4",
                                    player1: "",
                                    player2: "",
                                    score: "",
                                    warm_up: "00:00",
                                    start: "00:00",
                                    end: "00:00",
                                    collapsed: false,
                                },
                            ],
                        },
                    ],
                },
            ],
        };
    },
    watch: {
        currentTemplate: {
            handler: function () {
                console.log(this.currentTemplate);
            },
            deep: true,
        },
    },
    methods: {
        save() {
            axios
                .post("/admin/tournament/results/" + this.tournament.id, {
                    tennis_matches: this.tennisMatches,
                })
                .then((res) => {
                    window.location.href = `/admin`;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getSurname(id) {
            if (id == "") {
                return "нет";
            }

            const player = this.players.find((pl) => pl.id == id);

            if (player === undefined) {
                return "ошибка";
            }
            return player.surname;
        },
        setGroups() {
            if (this.groups.length == 1) {
                this.setOnlyGroup();
                return;
            }
            /*if (this.players.length <= 4) {
                const titles = [
                    "A1-A4",
                    "A2-A3",
                    "A1-A3",
                    "A2-A4",
                    "A1-A2",
                    "A3-A4",
                ];

                titles.forEach((title) => {
                    this.tennisMatches.push({
                        expected_court: "",
                        court: "",
                        title: title,
                        player1: "",
                        player2: "",
                        score: "",
                        warm_up: "00:00",
                        start: "00:00",
                        end: "00:00",
                    });
                });
            }*/
        },
        setOnlyGroup() {
            const playersCount = this.groups[0].players.length;

            const template = this.templates.find(
                (tmp) => tmp.amount == playersCount
            );

            if (template !== undefined) {
                this.currentTemplate = template.rounds;
            }
        },
    },
};
</script>
