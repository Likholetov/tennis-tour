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
                                        @click="
                                            deletePlayer(index, player.label)
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
        <div class="col-md-12">
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
                    <div class="row mb-3">
                        <div
                            class="col-6"
                            style="display: flex; align-items: end"
                        >
                            <button
                                @click="addGroup"
                                type="button"
                                class="btn btn-success float-left"
                            >
                                Добавить группу
                            </button>
                        </div>
                    </div>
                    <Container
                        orientation="horizontal"
                        @drop="onColumnDrop($event)"
                        drag-handle-selector=".column-drag-handle"
                        @drag-start="dragStart"
                        :drop-placeholder="upperDropPlaceholderOptions"
                    >
                        <Draggable
                            v-for="column in scene.children"
                            :key="column.id"
                        >
                            <div :class="column.props.className">
                                <div class="card-column-header">
                                    <span class="column-drag-handle"
                                        >&#x2630;</span
                                    >
                                    {{ column.name }}
                                </div>
                                <Container
                                    group-name="col"
                                    @drop="(e) => onCardDrop(column.id, e)"
                                    @drag-start="(e) => log('drag start', e)"
                                    @drag-end="(e) => log('drag end', e)"
                                    :get-child-payload="
                                        getCardPayload(column.id)
                                    "
                                    drag-class="card-ghost"
                                    drop-class="card-ghost-drop"
                                    :drop-placeholder="dropPlaceholderOptions"
                                >
                                    <Draggable
                                        v-for="card in column.children"
                                        :key="card.id"
                                    >
                                        <div
                                            :class="card.props.className"
                                            :style="card.props.style"
                                            style="padding: 4px"
                                        >
                                            <h4>{{ card.name }}</h4>
                                            <!-- <p class="card-text">
                                                {{ card.data }}
                                            </p> -->
                                        </div>
                                    </Draggable>
                                </Container>
                            </div>
                        </Draggable>
                    </Container>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>

<script>
const lorem = `Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.`;
const columnNames = ["Нераспределенные", "Группа А", "Группа Б", "Группа В"];
const cardColors = ["white"];

const pickColor = () => {
    const rand = Math.floor(Math.random() * 10);
    return cardColors[rand];
};

const generateItems = (count, creator) => {
    const result = [];
    for (let i = 0; i < count; i++) {
        result.push(creator(i));
    }
    return result;
};

// const scene = {
//     type: "container",
//     props: {
//         orientation: "horizontal",
//     },
//     children: generateItems(4, (i) => ({
//         id: `column${i}`,
//         type: "container",
//         name: columnNames[i],
//         props: {
//             orientation: "vertical",
//             className: "card-container",
//         },
//         children: generateItems(+(Math.random() * 10).toFixed() + 1, (j) => ({
//             type: "draggable",
//             id: `${i}${j}`,
//             props: {
//                 className: "card",
//                 style: { backgroundColor: pickColor() },
//             },
//             data: lorem.slice(0, Math.floor(Math.random() * 150) + 30),
//             number: 1 + j,
//         })),
//     })),
// };

const scene = {
    type: "container",
    props: {
        orientation: "horizontal",
    },
    children: [
        {
            id: `0`,
            type: "container",
            name: "Нераспределенные",
            props: {
                orientation: "vertical",
                className: "card-container",
            },
            children: [],
        },
    ],
};

const applyDrag = (arr, dragResult) => {
    const { removedIndex, addedIndex, payload } = dragResult;
    if (removedIndex === null && addedIndex === null) return arr;

    const result = [...arr];
    let itemToAdd = payload;

    if (removedIndex !== null) {
        itemToAdd = result.splice(removedIndex, 1)[0];
    }

    if (addedIndex !== null) {
        result.splice(addedIndex, 0, itemToAdd);
    }

    return result;
};

import moment from "moment";
import { Container, Draggable } from "vue-dndrop";

export default {
    components: { Container, Draggable },

    created() {
        console.log(this.scene);
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
    },
    props: ["date", "categories", "players"],
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
            // drag n drop

            upperDropPlaceholderOptions: {
                className: "cards-drop-preview",
                animationDuration: "150",
                showOnTop: true,
            },
            dropPlaceholderOptions: {
                className: "drop-preview",
                animationDuration: "150",
                showOnTop: true,
            },
            scene,
        };
    },
    watch: {
        options: {
            handler: function () {},
            deep: true,
        },
        scene: {
            handler: function () {},
            deep: true,
        },
    },
    methods: {
        addGroup() {
            const groupNumber = this.scene.children.length;

            console.log(groupNumber);

            this.scene.children.push({
                id: groupNumber,
                type: "container",
                name: `Новая группа ${groupNumber}`,
                props: {
                    orientation: "vertical",
                    className: "card-container",
                },
                children: [],
            });
        },
        deletePlayer(index, name) {
            console.log(index);
            this.playersList.splice(index, 1);

            this.scene.children.forEach((column) => {});
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

            this.scene.children[0].children.push({
                type: "draggable",
                id: `-${playersCount}`,
                props: {
                    className: "card",
                    style: { backgroundColor: pickColor() },
                },
                data: "новый игрок",
                name:
                    this.newSurname +
                    " " +
                    this.newName +
                    " " +
                    this.newPatronimic,
            });

            this.newName = "";
            this.newSurname = "";
            this.newPatronimic = "";
        },
        addExisting() {
            if (this.currentPlayer == "") {
                return;
            }
            this.playersList.push(this.currentPlayer);

            this.scene.children[0].children.push({
                type: "draggable",
                id: `${this.currentPlayer.code}`,
                props: {
                    className: "card",
                    style: { backgroundColor: pickColor() },
                },
                data: "игрок",
                name: this.currentPlayer.label,
            });

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
        // drag n drop
        onColumnDrop(dropResult) {
            const scene = Object.assign({}, this.scene);
            scene.children = applyDrag(scene.children, dropResult);
            this.scene = scene;
        },

        onCardDrop(columnId, dropResult) {
            if (
                dropResult.removedIndex !== null ||
                dropResult.addedIndex !== null
            ) {
                const scene = Object.assign({}, this.scene);
                const column = scene.children.filter(
                    (p) => p.id === columnId
                )[0];
                const columnIndex = scene.children.indexOf(column);

                const newColumn = Object.assign({}, column);
                newColumn.children = applyDrag(newColumn.children, dropResult);
                scene.children.splice(columnIndex, 1, newColumn);

                this.scene = scene;
            }
        },

        getCardPayload(columnId) {
            return (index) => {
                return this.scene.children.filter((p) => p.id === columnId)[0]
                    .children[index];
            };
        },

        dragStart() {
            console.log("drag started");
        },

        log(...params) {
            console.log(...params);
        },
    },
};
</script>

<style>
.dndrop-container {
    margin-right: 10px;
    margin-left: 10px;
}

.card-column-header {
    margin-bottom: 10px;
}

.dndrop-draggable-wrapper {
    width: 200px;
}

.card-container {
    width: 200px;
}
</style>
