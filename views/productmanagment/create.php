<h1>Create Product</h1>
<br/>

<form>
    <div class="row mb-3"><label for="inputText" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input name="product_name" type="text" class="form-control"></div>
    </div>

    </div>
    <div class="row mb-3"><label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10"><input name="price" type="number" class="form-control"></div>
    </div>
    <div class="row mb-3"><label for="inputNumber" class="col-sm-2 col-form-label">Quantity</label>
        <div class="col-sm-10"><input name="" type="number" class="form-control"></div>
    </div>
    <div class="row mb-3"><label for="inputNumber" class="col-sm-2 col-form-label">Product Image</label>
        <div class="col-sm-10"><input name="quantity" class="form-control" type="file" id="formFile"></div>
    </div>

    <div class="row mb-3"><label for="inputPassword" class="col-sm-2 col-form-label">Descritpion</label>
        <div class="col-sm-10"><textarea name="description" class="form-control" style="height: 100px"></textarea></div>
    </div>


    <div class="row mb-3"><label class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10"><select name="categoory" class="form-select" aria-label="Default select example">
                <option selected="">Select category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select></div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-10 text-center">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </div>
</form>