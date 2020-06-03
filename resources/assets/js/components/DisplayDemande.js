import React, {Component} from 'react';
import axios from 'axios';
import { Link } from 'react-router';


class DisplayDemande extends Component {
  constructor(props) {
       super(props);
       this.state = {value: '', demandes: ''};
     }
     componentDidMount(){
       axios.get('http://localhost:8000/demandes')
       .then(response => {
         this.setState({ demandes: response.data });
       })
       .catch(function (error) {
         console.log(error);
       })
     }
     

  render(){
    return (
      <div>
        <h1>Demandes</h1>

        <div className="row">
          <div className="col-md-10"></div>
          <div className="col-md-2">
            <Link to="/add-item">Create Item</Link>
          </div>
        </div><br />

        <table className="table table-hover">
            <thead>
            <tr>
                <td>ID</td>
                <td>Item Name</td>
                <td>Item Price</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            <tr>
          <td>
            {this.props.obj.id}
          </td>
          <td>
            {this.props.obj.name}
          </td>
          <td>
            {this.props.obj.price}
          </td>
          <td>
            <Link to={"edit/"+this.props.obj.id} className="btn btn-primary">Edit</Link>
          </td>
          <td>
          <form onSubmit={this.handleSubmit}>
           <input type="submit" value="Delete" className="btn btn-danger"/>
         </form>
          </td>
        </tr>
            </tbody>
        </table>
    </div>
    )
  }
}
export default DisplayDemande;
