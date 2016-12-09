Rails.application.routes.draw do
	get 'boards' =>'boards#index'
	boardsというurlが来たら、コントローラーのindexを呼び出す。
  # For details on the DSL available within this file, see http://guides.rubyonrails.org/routing.html
end
