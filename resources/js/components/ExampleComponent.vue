<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm" style="padding-left: 20px;">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Тестовое задание</h4>
                    </div>

                    <div class="card-body" style="padding-left: 20px;">
                        <div class="mb-3">
                            <h5 class="mb-0">Сущности:</h5>
                            <ul>
                                <li>Категории – есть только название, должны быть многоуровневыми (условно 6 уровней максимум), имеет порядок на своем уровне вложенности.</li>
                                <li>Товары – есть только название и цена, может лежать только в одной категории, имеет определенный порядок на своем уровне вложенности, может лежать только в одной категории.</li>
                            </ul>
                        </div>

                        <div class="mb-3">
                            <h5 class="mb-0">Необходимо 3 метода API:</h5>
                            <ol>
                                <li>
                                    <strong>Отображение списка всех категорий с товарами</strong>
                                    <p>GET /categories</p>
                                    <p>Контроллер: CategoryController@index</p>
                                    <p>Описание: Возвращает список всех категорий с их товарами, чтобы была видна вложенность.</p>
                                </li>
                                <li>
                                    <strong>Генерация отчета покупок</strong>
                                    <p>GET /reports/purchases/{format}</p>
                                    <p>Контроллер: PurchaseReportController@generateReport</p>
                                    <p>Описание: Генерирует отчет о покупках за последний месяц по дням в указанном формате (JSON или CSV).</p>
                                </li>
                                <li>
                                    <strong>Метод перемещения товара в другую категорию</strong>
                                    <p>PUT /products/{product}/move-to-category/{category}</p>
                                    <p>Контроллер: ProductController@moveToCategory</p>
                                    <p>Описание: Перемещает товар в другую категорию.</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .card {
        transition: box-shadow 0.3s ease-in-out;
    }
    .card:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }
</style>
