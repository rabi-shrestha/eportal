<div class="filter filter--fixed">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="filter__content">
                    <!-- menu btn -->
                    <button class="filter__menu" type="button"><i class="ti ti-filter"></i>Filter</button>
                    <!-- end menu btn -->

                    <!-- filter desk -->
                    <div class="filter__items">
                        <?php $genres = get_genre_list(); ?>

                        <select class="filter__select" name="genre" id="filter__genre">
                            <?php foreach ($genres as $value => $label): ?>
                                <option value="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($label) ?></option>
                            <?php endforeach; ?>
                        </select>

                        <select class="filter__select" name="quality" id="filter__quality">
                            <option value="0">Any quality</option>
                            <option value="1">HD 1080</option>
                            <option value="2">HD 720</option>
                            <option value="3">DVD</option>
                            <option value="4">TS</option>
                        </select>

                        <select class="filter__select" name="rate" id="filter__rate">
                            <option value="0">Any rating</option>
                            <option value="1">from 3.0</option>
                            <option value="2">from 5.0</option>
                            <option value="3">from 7.0</option>
                            <option value="4">Golder Star</option>
                        </select>

                        <select class="filter__select" name="sort" id="filter__sort">
                            <option value="0">Relevance</option>
                            <option value="1">Newest</option>
                            <option value="2">Oldest</option>
                        </select>
                    </div>
                    <!-- end filter desk -->
                </div>
            </div>
        </div>
    </div>
</div>