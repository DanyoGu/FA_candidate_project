import React, { useState, useMemo } from 'react'
import { useTable } from 'react-table'
import { COLUMNS } from './Columns'
import '../css/table.css'

function HookCollapsible(props) {


    const [isShown, setIsShown] = useState(false)
    const columns = useMemo(() => COLUMNS, [])
    const data = useMemo(() => props.data, [])

    
    const tableInstance = useTable({
        columns,
        data
    })
    
    const { 
        getTableProps, 
        getTableBodyProps,
        headerGroups,
        rows,
        prepareRow
    } = tableInstance
    
    const toggle = () => {
        setIsShown(!isShown);
    }

    return (
        <div className="table-container">
            <div className="table-container-menu">
                <span className="table-title">{props.title}</span>
                <button onClick={toggle} className="show-hide-button">Show/Hide</button>    
            </div>
             {isShown && (
                 <table {...getTableProps()} className="table">
                     <thead>
                         {headerGroups.map(headerGroup => (
                                <tr {...headerGroup.getHeaderGroupProps()}>
                                    {headerGroup.headers.map(column => (
                                        <th {...column.getHeaderProps()}>{column.render('Header')}</th>
                                    ))}
                                </tr>
                             ))
                         }
                     </thead>
                     <tbody {...getTableBodyProps()}>
                         {rows.map((row) => {
                             prepareRow(row)
                             return (
                                <tr {...row.getRowProps()}>
                                    {row.cells.map((cell) => {
                                        return <td {...cell.getCellProps()}>{cell.render('Cell')}</td>
                                    })}
                                </tr>
                             )
                         })}
                     </tbody>
                 </table>
             )}
        </div>
    )
}

export default HookCollapsible


