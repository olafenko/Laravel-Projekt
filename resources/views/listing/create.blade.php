@extends("layout")

@section("content")
    <div class="listingFormPage">

        <div class="formCard">

            <h2>Dodawanie ogłoszenia</h2>

            <form method="post" action="">

                <div class="formInput">
                    <label>Tytuł</label>
                    <input type="text" name="title" required>
                </div>
                <div class="formInput">
                    <label>Kategoria</label>
                    <select name='categoryId' required>
                        TODO select kategorii
                    </select>
                </div>

                <div class="formInput">
                    <label>Lokalizacja</label>
                    <input type="text" name="location" required>
                </div>

                <div class="formInput">
                    <label>Cena</label>
                    <input type="number" name="price" step="0.01">
                </div>

                <div class="formInput">
                    <label>Zdjęcie (URL)</label>
                    <input type="file" name="image">
                </div>

                <div class="formInput">
                    <label>Opis</label>
                    <textarea name="description"></textarea>
                </div>

                <div class="formActions">
                    <input class="saveBtn" type="submit" value="Zapisz">
                    <a class="cancelBtn" href="/listings">Anuluj</a>
                </div>
            </form>
        </div>
    </div>
@endsection
