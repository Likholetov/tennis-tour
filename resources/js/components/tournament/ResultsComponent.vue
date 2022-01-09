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
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Круг 1</h3>

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
                <div class="card-body" style="padding: 5px">
                    <div
                        class="card card-primary"
                        v-for="(tennisMatch, key) in tennisMatches"
                        :key="'tennisMatches' + key"
                    >
                        <div class="card-header">
                            <h3 class="card-title">{{ tennisMatch.title }}</h3>

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
                                                    tennisMatches[key]
                                                        .expected_court
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
                                                v-model="
                                                    tennisMatches[key].court
                                                "
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
                                                v-model="
                                                    tennisMatches[key].player1
                                                "
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
                                                v-model="
                                                    tennisMatches[key].player2
                                                "
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
                                                v-model="
                                                    tennisMatches[key].score
                                                "
                                                type="text"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>нач. разм.</td>
                                        <td>
                                            <input
                                                v-model="
                                                    tennisMatches[key].warm_up
                                                "
                                                type="time"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>нач. игры</td>
                                        <td>
                                            <input
                                                v-model="
                                                    tennisMatches[key].start
                                                "
                                                type="time"
                                                class="form-control"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>окон. игры</td>
                                        <td>
                                            <input
                                                v-model="tennisMatches[key].end"
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
            tennisMatches: [],
            playersListGroups: [],
        };
    },
    watch: {},
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
        },
    },
};
</script>
