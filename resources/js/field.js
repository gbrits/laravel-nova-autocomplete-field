import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-autocomplete', IndexField)
  app.component('detail-autocomplete', DetailField)
  app.component('form-autocomplete', FormField)
})
