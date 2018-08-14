<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Commentaires signalés</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Identifiant</th>
                      <th>Auteur</th>
                      <th>Commentaires</th>
                      <th>Suppression</th>
                      <th>Approbation</th>
                    </tr>
                  </thead>
                  <tfoot>
                   <tr>
                      <th>Identifiant</th>
                     <th>Auteur</th>
                      <th>Commentaires</th>
                      <th>Suppression</th>
                      <th>Approbation</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php while($comment=$signals->fetch())
                  {?>
                   
                    <tr>
                      <td><?=$comment['comment_id']?></td>
                      <td><?=$comment['author']?></td>
                      <td><?=$comment['comment']?></td>
                      <td><a href="admin.php?action=deleteComment&comment_id=<?=$comment['comment_id']?>"><button class="btn btn-danger" type="submit">Supprimer</button></a></td>
                      <td><a href="admin.php?action=validateComment&comment_id=<?=$comment['comment_id']?>"><button class="btn btn-success" type="submit">Valider</button></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>