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
                    <div v-if="false" class="row mb-3">
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
                                            <h4>{{ card.number }}</h4>
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
        /*{
            id: `0`,
            type: "container",
            name: "Нераспределенные",
            props: {
                orientation: "vertical",
                className: "card-container",
            },
            children: [],
        },*/
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
        const parsedGroups = JSON.parse(this.groups);
        parsedGroups.forEach((group) => {
            console.log(group.players);
            this.addGroup(group.title, group.id, group.players);
        });
    },
    props: ["groups"],
    data() {
        return {
            // players
            playersList: [],
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
        addGroup(title, id, children) {
            const childrenArray = [];

            if (children.length > 0) {
                children.forEach((child) => {
                    childrenArray.push({
                        type: "draggable",
                        id: child.id,
                        props: {
                            className: "card",
                            style: { backgroundColor: pickColor() },
                        },
                        data: 1,
                        number:
                            child.surname +
                            " " +
                            child.name +
                            " " +
                            child.patronymic,
                    });
                });
            }

            this.scene.children.push({
                id: id,
                type: "container",
                name: title,
                props: {
                    orientation: "vertical",
                    className: "card-container",
                },
                children: childrenArray,
            });
        },
        save() {
            /*console.log(this.time);
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
                    groups: this.groups,
                })
                .then((res) => {
                    window.location.href = `/admin/calendar`;
                    console.log(res);
                })
                .catch((err) => {
                    //this.loading = false;
                    console.log(err);
                });*/
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
