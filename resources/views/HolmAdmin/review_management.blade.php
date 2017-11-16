<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
              <i class="fa fa-comment" aria-hidden="true"></i>
          </span>
        Reviews managament
    </h2>
    <div class="tableWrap tableWrap--margin-t">
        <table class="adminTable">
            <thead>
            <tr>
                <td class="orderNumber">
                  <span class="td-title td-title--number">
                   №
                  </span>
                </td>
                <td class=" ordninary-td ordninary-td--small no-padding-l">
                  <span class="td-title td-title--time">
                    date
                  </span>
                </td>
                <td class=" ordninary-td ordninary-td--big ">
                  <span class="td-title td-title--darkest-mint ">
                  service user
                  </span>
                </td>
                <td class=" bigger-td   ">
                  <span class="td-title td-title--comment">
                    Comment
                  </span>
                </td>
                <td class=" ordninary-td   no-padding-l">
                  <span class="td-title td-title--light-blue">
                    actions
                  </span>
                </td>
            </tr>
            <tr class="extra-tr">
                <td>
                </td>
                <td>
                </td>
                <td class="for-inner">
                    <table class="innerTable ">
                        <tbody>
                        <tr>
                            <td class="idField">
                                <span class="extraTitle">id</span>
                            </td>
                            <td class="">
                                <span class="extraTitle">name</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>
                  <span>
                    {{$review->id}}
                  </span>
                    </td>
                    <td>
                        <p>{{$review->created_at}}</p>
                    </td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody>
                            <tr>
                                <td class="idField">
                                    <span>{{$review->booking->bookingServiceUser->id}}</span>
                                </td>
                                <td class="">
                                    <a href="#"
                                       class="tableLink">{{$review->booking->bookingServiceUser->full_name}}</a>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </td>

                    <td>
                    <span>
                        {{$review->comment}}
                    </span>
                    </td>
                    <td>
                        <div class="actionsGroup">
                            <a href="#" class="actionsBtn actionsBtn--accept ">
                                confirm
                            </a>
                            <a href="#" class="actionsBtn actionsBtn--edit ">
                                edit
                            </a>
                            <a href="#" class="actionsBtn actionsBtn--delete ">
                                delete
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>