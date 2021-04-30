                @csrf

                    <div class="form-group">
                      <label for="">Designation</label>
                      <input value="{{ old('designation')?? $produit->designation }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId" requiredber>
                      @error('designation')
                        <small  class="text-danger">{{ $message }}</small>
                      @enderror

                    </div>
                    <div class="form-group">
                      <label for="">Categorie</label>
                      <select class="form-control" name="categorie" id="">
                          @foreach ($categories as $categorie)
                                  <option  {{ $categorie->id == old("categorie") ? "selected" : " " }} value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Prix</label>
                      <input value="{{ old('prix')?? $produit->prix}}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      @error('prix')
                            <small  class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Quantite</label>
                      <input value="{{ old('quantite') ?? $produit->quantite }}" type="number" name="quantite" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      @error('quantite')
                        <small  class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $produit->description }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
                      @error('image')
                         <small  class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Valider</button>
